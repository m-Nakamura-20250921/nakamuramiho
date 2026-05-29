<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260518031401_users extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (
        id INT AUTO_INCREMENT NOT NULL, 
        name VARCHAR(255) NOT NULL,
        email VARCHAR(180) NOT NULL, 
        roles JSON NOT NULL, 
        password_hash VARCHAR(255) NOT NULL, 
        created_at DATETIME NOT NULL, 
        updated_at DATETIME NOT NULL, 
        role VARCHAR(255) NOT NULL, 
        deleted_at DATETIME DEFAULT NULL,
        status INT DEFAULT 0 NOT NULL, 
        name_kana VARCHAR(255) NOT NULL, 
        UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), 
        PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
    }
}
