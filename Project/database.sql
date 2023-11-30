--USERBASE--
CREATE TABLE registration(
    user_id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,

    PRIMARY KEY(user_id)
);

--TOTAL SCORE FOR EACH GAME TO USER--
--MATCH SESSION SCORE TO GAME AND ADD IN--
CREATE TABLE score(
    score_id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    game_name VARCHAR(255) NOT NULL,
    games_played INT,
    win INT,
    loss INT,
    draw INT,

    PRIMARY KEY(score_id),
    FOREIGN KEY(user_id) REFERENCES registration(user_id)
);

--SCORE FROM EACH SESSION PER USER--
CREATE TABLE game_session(
    session_id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    game_name VARCHAR(255) NOT NULL,
    games_played INT,
    win INT,
    loss INT,
    draw INT,

    PRIMARY KEY(session_id),
    FOREIGN KEY(user_id) REFERENCES registration(user_id)
);

INSERT INTO score(user_id, game_name, games_played, win, loss, draw)
    VALUES (1, "Rock Paper Scissors", 30, 10, 10, 10),
           (3, "Rock Paper Scissors", 30, 5, 10, 15),
           (5, "Blackjack", 11, 1, 10, 0),
           (1, "Blackjack", 10, 10, 0, 0);

INSERT INTO game_session(user_id, game_name, games_played, win, loss, draw)
    VALUES (1, "Rock Paper Scissors", 30, 10, 10, 10),
           (3, "Rock Paper Scissors", 15, 5, 5, 5),
           (5, "Blackjack", 11, 1, 10, 0),
           (1, "Blackjack", 10, 10, 0, 0),
           (3, "Rock Paper Scissors", 15, 0, 5, 10);