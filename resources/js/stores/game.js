const game = new Phaser.Game(800, 600, Phaser.AUTO, '', {
    preload: preload,
    create: create,
    update: update,
})

function preload(){
    game.load.spritesheet('bear', 'storage/assets/sprites/brown_bear.png', 32, 32)
}

function create(){}

function update(){}
