# SQL Users

- create table user with index

      CREATE TABLE users(
      id INT NOT NULL AUTO_INCREMENT,
      uuid VARCHAR(255) NOT NULL,
      referral VARCHAR(255) NULL DEFAULT 'kosong',
      name VARCHAR(255) NOT NULL,
      email VARCHAR(255) NOT NULL,
      email_verified_at VARCHAR(255) NOT NULL DEFAULT 'kosong',
      password VARCHAR(255) NOT NULL,
      profile_picture_path VARCHAR(255) NULL DEFAULT 'kosong',
      status VARCHAR(255) NULL DEFAULT 'kosong',
      keterangan VARCHAR(255) NULL DEFAULT 'kosong',
      other VARCHAR(255) NULL DEFAULT 'kosong',
      alasan_ditolak VARCHAR(255) NULL DEFAULT 'kosong',
      post_by VARCHAR(255) NOT NULL,
      edited_by VARCHAR(255) NOT NULL,
      deleted_by VARCHAR(255) NULL DEFAULT 'kosong',
      createdAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
      custom_unix_createdAt VARCHAR(255) NOT NULL,
      updatedAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
      custom_unix_updatedAt VARCHAR(255) NOT NULL,
      soft_delete TIMESTAMP NULL DEFAULT NULL,
      custom_unix_soft_delete VARCHAR(255) NULL,
      PRIMARY KEY(id),
      INDEX code_index(uuid)
      ) ENGINE = INNODB;

- insert data ke table users

        INSERT INTO users (uuid, name, email, password, post_by, edited_by,custom_unix_createdAt,custom_unix_updatedAt)
        VALUES ("san-001", "san", "san@san.com", "sansansan", "san","san", 1693045519, 1693045519),
        ("san-002", "BE", "be@be.com", "bebebe", "be","be", 1693045519, 1693045519),
        ("san-003", "ryuu", "ryuu@ryuu.com", "ryuuryuuryuu", "ryuu","ryuu", 1693045519, 1693045519);

        SELECT * FROM users;

## Donasi

- jika kalian suka dengan projek saya dan ingin support saya, bisa donasi via transfer
  - Jago/Jago Syariah bank digital 5055-6459-9169
