<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230126135956 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bonus (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, value1 INT NOT NULL, value2 INT NOT NULL, value3 INT NOT NULL, value4 INT NOT NULL, value5 INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, user_id INT NOT NULL, guild_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE empire (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, leader_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eq (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type INT NOT NULL, description VARCHAR(1023) NOT NULL, quantity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE guild (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, leader_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type INT NOT NULL, bonus1 INT NOT NULL, bonus1_value INT NOT NULL, bonus2 INT NOT NULL, bonus2_value INT NOT NULL, bonus3 INT NOT NULL, bonus3_value INT NOT NULL, bonus4 INT NOT NULL, bonus4_value INT NOT NULL, bonus5 INT NOT NULL, bonus5_value INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pet (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, exp INT NOT NULL, level INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planet (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, size INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quest (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(5000) NOT NULL, reward1 INT NOT NULL, reward1_value INT NOT NULL, reward2 INT DEFAULT NULL, reward2_value INT DEFAULT NULL, reward3 INT DEFAULT NULL, reward3_value INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bonus');
        $this->addSql('DROP TABLE `character`');
        $this->addSql('DROP TABLE empire');
        $this->addSql('DROP TABLE eq');
        $this->addSql('DROP TABLE guild');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE pet');
        $this->addSql('DROP TABLE planet');
        $this->addSql('DROP TABLE quest');
    }
}
