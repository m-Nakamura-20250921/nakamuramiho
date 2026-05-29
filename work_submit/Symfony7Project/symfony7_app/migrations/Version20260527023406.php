<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260527023406 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD stock_quantity INT NOT NULL, ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL, ADD deleted_at DATETIME NOT NULL, DROP gender, DROP image_url, CHANGE price price BIGINT NOT NULL, CHANGE color image_path VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD gender VARCHAR(255) DEFAULT NULL, ADD image_url VARCHAR(255) DEFAULT NULL, DROP stock_quantity, DROP created_at, DROP updated_at, DROP deleted_at, CHANGE price price INT NOT NULL, CHANGE image_path color VARCHAR(255) NOT NULL');
    }
}
