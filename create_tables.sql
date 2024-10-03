
CREATE TABLE genres (
    gid INT PRIMARY KEY AUTO_INCREMENT,
    mgenre VARCHAR(50)
);

CREATE TABLE movies (
    mid INT PRIMARY KEY AUTO_INCREMENT,
    mname VARCHAR(100),
    myear VARCHAR (4), --kommer bara vara 4 tecken långt
    mgenreid INT,
    FOREIGN KEY (mgenreid) REFERENCES genres(gid), --länkar ihop till genre tabellen
    mrating INT CHECK (mrating >=1 AND mrating <=5) --säkerställer att ratingen är mellan 1 och 5
);