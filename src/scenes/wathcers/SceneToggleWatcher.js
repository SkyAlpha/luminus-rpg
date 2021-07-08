export class SceneToggleWatcher {
    static toggleScene(sceneContext, name, player) {
        if (!sceneContext.scene.isVisible(name)) {
            sceneContext.scene.launch(name, {
                player: player,
            });
            player.canMove = false;
        } else {
            sceneContext.scene.get(name).scene.stop();
            player.canMove = true;
        }
    }
}
