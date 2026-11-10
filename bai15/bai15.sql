CREATE DATABASE IF NOT EXISTS review
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;
USE review;

CREATE TABLE IF NOT EXISTS binhchon (
    idBC INT PRIMARY KEY AUTO_INCREMENT,
    MoTa TEXT,
    SoLanChon INT DEFAULT 0
);

CREATE TABLE IF NOT EXISTS phuongan (
    idPA INT PRIMARY KEY AUTO_INCREMENT,
    idBC INT,
    MoTa VARCHAR(255),
    SoLanChon INT DEFAULT 0,
    FOREIGN KEY (idBC) REFERENCES binhchon(idBC)
);

INSERT IGNORE INTO binhchon (idBC, MoTa, SoLanChon) VALUES
(1, 'Bạn nghĩ hocweb.com.vn có giúp bạn học tập tốt hơn không?', 0);

INSERT IGNORE INTO phuongan (idPA, idBC, MoTa, SoLanChon) VALUES
(1, 1, 'Rất hữu ích', 0),
(2, 1, 'Hữu ích', 0),
(3, 1, 'Bình thường', 0),
(4, 1, 'Không cần thiết', 0);
