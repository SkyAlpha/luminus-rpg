<?php
namespace Grav\Plugin\Shortcodes;

use Grav\Common\Data\Data;
use Grav\Common\Utils;
use Thunder\Shortcode\Shortcode\ProcessedShortcode;

class PrismShortcode extends Shortcode
{
    public function init()
    {
        $this->shortcode->getRawHandlers()->add('prism', function(ProcessedShortcode $sc) {

            $config = new Data($this->config->get('plugins.prism-highlight'));

            $content = $sc->getContent();

            $git = $sc->getParameter('git');
            if ($git) {
                $content = $this->processGit($git) ?? $content;
            }

            $classes = $sc->getParameter('classes', $this->getBbCode($sc)) ?: 'language-text';
            $id = $sc->getParameter('id');
            $highlight_lines = $sc->getParameter('highlight');


            $enable_line_numbers = (bool) Utils::contains($classes, 'line-numbers') ?: $config->get('plugins.line-numbers');
            $enable_command_line = (bool) Utils::contains($classes, 'command-line') ?: $config->get('plugins.command-line');

            $ln_start = $sc->getParameter('ln-start');
            $cl_prompt = $sc->getParameter('cl-prompt', $config->get('plugins.command-line-prompt'));
            $cl_output = $sc->getParameter('cl-output');

            return $this->twig->processTemplate('shortcodes/prism-highlight.html.twig', [
                'content' => trim($content),
                'classes' => $classes,
                'id' => $id,
                'enable_line_numbers' => $enable_line_numbers,
                'enable_command_line' => $enable_command_line,
                'cl_prompt' => $cl_prompt,
                'cl_output' => $cl_output,
                'ln_start' => $ln_start,
                'highlight_lines' => $highlight_lines,
            ]);
        });
    }

    protected function processGit($git)
    {
        $content = null;
        try {
            $git = preg_replace(['#http[s]*:\/\/github.com\/#', '#\/blob\/#'], ['https://raw.github.com/', '/'], $git);
            preg_match('#\?slice=(.*)#', $git, $matches);
            $git_file = file_get_contents($git);
            $lines = $matches[1] ?? null;

            if ($lines && $git_file) {
                $file_lines = explode("\n", $git_file);
                //rejig things so it's the array is index starting at line #1
                array_unshift($file_lines,"");
                unset($file_lines[0]);
                $specific_lines = explode(':', $lines);

                if (count($specific_lines) === 1) {
                    $content = $file_lines[$specific_lines[0]] ?? $git_file;
                } elseif (count($specific_lines) === 2) {
                    $start = $specific_lines[0];
                    $end = $specific_lines[1];
                    if ($end < 0) {
                        $end = count($file_lines) + $end;
                    }
                    $new_content = '';
                    foreach ($file_lines as $line_no => $line) {
                        if ($line_no >= $start && $line_no <= $end) {
                            $new_content .= $line . "\n";
                        }
                    }
                    $content = $new_content;
                }
            } else {
                $content = $git_file;
            }


        } catch (\exception $e) {
            $content = "could not find: " . $git;
        }
        return $content;
    }
}
