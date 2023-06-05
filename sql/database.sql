CREATE DATABASE IF NOT EXISTS astar;

use astar;

CREATE TABLE IF NOT EXISTS Player (
    player_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    image VARCHAR(255),
    email VARCHAR(255) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    money FLOAT DEFAULT 0,
    gems INTEGER DEFAULT 0,
    stamina INTEGER DEFAULT 0,
    account_create TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Monster (
    monster_id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image VARCHAR(255),
    base_rarity VARCHAR(255) NOT NULL,
    base_attack INTEGER DEFAULT 0,
    base_defense INTEGER DEFAULT 0,
    base_speed INTEGER DEFAULT 0,
    base_hp INTEGER DEFAULT 0,
    evolve_level INTEGER,
    evolve_token_id INTEGER
);

CREATE TABLE IF NOT EXISTS Type (
    type_id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);
CREATE TABLE IF NOT EXISTS MonsterType (
    monster_id INTEGER NOT NULL,
    type_id INTEGER NOT NULL,
    PRIMARY KEY (monster_id, type_id),
    FOREIGN KEY (monster_id) REFERENCES Monster(monster_id),
    FOREIGN KEY (type_id) REFERENCES Type(type_id)
);

CREATE TABLE IF NOT EXISTS TypeEffective (
    type_id INT NOT NULL,
    effective_type_id INT NOT NULL,
    PRIMARY KEY (type_id, effective_type_id),
    FOREIGN KEY (type_id) REFERENCES Type(type_id),
    FOREIGN KEY (effective_type_id) REFERENCES Type(type_id)
);
CREATE TABLE IF NOT EXISTS TypeWeak (
    type_id INT NOT NULL,
    weak_type_id INT NOT NULL,
    PRIMARY KEY (type_id, weak_type_id),
    FOREIGN KEY (type_id) REFERENCES Type(type_id),
    FOREIGN KEY (weak_type_id) REFERENCES Type(type_id)
);

CREATE TABLE IF NOT EXISTS TypeResistant (
    type_id INT NOT NULL,
    resistant_type_id INT NOT NULL,
    FOREIGN KEY (type_id) REFERENCES Type(type_id),
    FOREIGN KEY (resistant_type_id) REFERENCES Type(type_id),
    PRIMARY KEY (type_id, resistant_type_id)
);

CREATE TABLE IF NOT EXISTS TypeImmune (
    type_id INT NOT NULL,
    immune_type_id INT NOT NULL,
    FOREIGN KEY (type_id) REFERENCES Type(type_id),
    FOREIGN KEY (immune_type_id) REFERENCES Type(type_id),
    PRIMARY KEY (type_id, immune_type_id)
);

CREATE TABLE Items (
    items_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    PRIMARY KEY (items_id)
);

CREATE TABLE EvolutionToken (
    evolution_token_id INT NOT NULL,
    monster_id INTEGER NOT NULL,
    PRIMARY KEY (evolution_token_id),
    FOREIGN KEY (evolution_token_id) REFERENCES Items(items_id),
    FOREIGN KEY (monster_id) REFERENCES Monster(monster_id)
);

CREATE TABLE BoostItems (
    boost_items_id INT NOT NULL,
    stat_boost ENUM('HP', 'ATK', 'DEF', 'SPD') NOT NULL,
    boost_value FLOAT NOT NULL,
    PRIMARY KEY (boost_items_id),
    FOREIGN KEY (boost_items_id) REFERENCES Items(items_id)
);


CREATE TABLE IF NOT EXISTS PlayerMonsters (
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
    boost_items_id INT,
    FOREIGN KEY (player_id) REFERENCES Player(player_id),
    FOREIGN KEY (monster_id) REFERENCES Monster(monster_id),
    FOREIGN KEY (boost_items_id) REFERENCES Items(items_id)
);

CREATE TABLE IF NOT EXISTS Inventory (
    inventory_id INT NOT NULL AUTO_INCREMENT,
    player_id INT NOT NULL,
    items_id INT NOT NULL,
    quantity INT NOT NULL,
    PRIMARY KEY (inventory_id),
    FOREIGN KEY (player_id) REFERENCES Player(player_id),
    FOREIGN KEY (items_id) REFERENCES Items(items_id)
);

CREATE TABLE IF NOT EXISTS Portal (
    portal_id INTEGER PRIMARY KEY,
    rarity_threshold VARCHAR(255) NOT NULL,
    gem_cost INTEGER DEFAULT 0
);

CREATE TABLE IF NOT EXISTS PortalMonster (
    portal_id INTEGER,
    monster_id INTEGER,
    weight INTEGER DEFAULT 1,
    FOREIGN KEY (portal_id) REFERENCES Portal(portal_id),
    FOREIGN KEY (monster_id) REFERENCES Monster(monster_id)
);

CREATE TABLE IF NOT EXISTS Dungeon (
    dungeon_id INTEGER PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    token_id INTEGER,
    stamina_cost INTEGER DEFAULT 0,
    available_days VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS PlayerDungeon (
    player_id INTEGER,
    dungeon_id INTEGER,
    remaining_attempts INTEGER DEFAULT 0,
    FOREIGN KEY (player_id) REFERENCES Player(player_id),
    FOREIGN KEY (dungeon_id) REFERENCES Dungeon(dungeon_id)
);