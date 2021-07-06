export class SceneToggleWatcher {
    static toggleScene(sceneContext, name, player) {
        if (!sceneContext.scene.isVisible(name)) {
            sceneContext.scene.launch(name, {
                player: player,
            });
        } else {
            sceneContext.scene.get(name).scene.stop();
        }
    }
}
