CREATE DATABASE astar;

use astar;

CREATE TABLE Player (
    player_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    gems INTEGER DEFAULT 0,
    stamina INTEGER DEFAULT 0,
    last_login TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (player_id)
);

CREATE TABLE Monster (
    monster_id INTEGER PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    base_rarity VARCHAR(255) NOT NULL,
    base_attack INTEGER DEFAULT 0,
    base_defense INTEGER DEFAULT 0,
    base_speed INTEGER DEFAULT 0,
    base_hp INTEGER DEFAULT 0,
    evolve_level INTEGER,
    evolve_token_id INTEGER
);

CREATE TABLE PlayerMonsters (
    player_monster_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    player_id INT NOT NULL,
    monster_id INT NOT NULL,
    surname VARCHAR(50) NOT NULL,
    rarity VARCHAR(10) NOT NULL,
    level INT NOT NULL DEFAULT 1,
    attack INT NOT NULL DEFAULT 0,
    defense INT NOT NULL DEFAULT 0,
    speed INT NOT NULL DEFAULT 0,
    hp INT NOT NULL DEFAULT 0,
    FOREIGN KEY (player_id) REFERENCES Player(player_id),
    FOREIGN KEY (monster_id) REFERENCES Monster(monster_id)
);

CREATE TABLE Portal (
    portal_id INTEGER PRIMARY KEY,
    rarity_threshold VARCHAR(255) NOT NULL,
    gem_cost INTEGER DEFAULT 0
);

CREATE TABLE PortalMonster (
    portal_id INTEGER,
    monster_id INTEGER,
    weight INTEGER DEFAULT 1,
    FOREIGN KEY (portal_id) REFERENCES Portal(portal_id),
    FOREIGN KEY (monster_id) REFERENCES Monster(monster_id)
);

CREATE TABLE EvolutionToken (
    token_id INTEGER PRIMARY KEY,
    monster_id INTEGER,
    FOREIGN KEY (monster_id) REFERENCES Monster(monster_id)
);

CREATE TABLE Dungeon (
    dungeon_id INTEGER PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    token_id INTEGER,
    stamina_cost INTEGER DEFAULT 0,
    available_days VARCHAR(255) NOT NULL
);

CREATE TABLE PlayerDungeon (
    player_id INTEGER,
    dungeon_id INTEGER,
    remaining_attempts INTEGER DEFAULT 0,
    FOREIGN KEY (player_id) REFERENCES Player(player_id),
    FOREIGN KEY (dungeon_id) REFERENCES Dungeon(dungeon_id)
);

CREATE TABLE Items (
    items_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    PRIMARY KEY (items_id)
);

CREATE TABLE Inventory (
    inventory_id INT NOT NULL AUTO_INCREMENT,
    player_id INT NOT NULL,
    items_id INT NOT NULL,
    quantity INT NOT NULL,
    PRIMARY KEY (inventory_id),
    FOREIGN KEY (player_id) REFERENCES Player(player_id),
    FOREIGN KEY (items_id) REFERENCES Items(items_id)
);