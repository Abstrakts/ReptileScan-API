<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200603112352 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE couplings (id INT AUTO_INCREMENT NOT NULL, animal_id INT DEFAULT NULL, date VARCHAR(255) NOT NULL, comment VARCHAR(255) DEFAULT NULL, companion VARCHAR(255) NOT NULL, INDEX IDX_844BF09C8E962C16 (animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE egg_laying (id INT AUTO_INCREMENT NOT NULL, animal_id INT DEFAULT NULL, date VARCHAR(255) NOT NULL, quantity INT DEFAULT NULL, comment VARCHAR(255) DEFAULT NULL, INDEX IDX_410847648E962C16 (animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notes (id INT AUTO_INCREMENT NOT NULL, animal_id INT DEFAULT NULL, date VARCHAR(255) NOT NULL, comment VARCHAR(255) NOT NULL, INDEX IDX_11BA68C8E962C16 (animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moults (id INT AUTO_INCREMENT NOT NULL, animal_id INT DEFAULT NULL, date VARCHAR(255) NOT NULL, length VARCHAR(255) DEFAULT NULL, comment VARCHAR(255) DEFAULT NULL, INDEX IDX_81B9A3258E962C16 (animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE habitat (id INT AUTO_INCREMENT NOT NULL, animal_id INT DEFAULT NULL, date VARCHAR(255) NOT NULL, comment VARCHAR(255) NOT NULL, INDEX IDX_3B37B2E88E962C16 (animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE couplings ADD CONSTRAINT FK_844BF09C8E962C16 FOREIGN KEY (animal_id) REFERENCES animals (id)');
        $this->addSql('ALTER TABLE egg_laying ADD CONSTRAINT FK_410847648E962C16 FOREIGN KEY (animal_id) REFERENCES animals (id)');
        $this->addSql('ALTER TABLE notes ADD CONSTRAINT FK_11BA68C8E962C16 FOREIGN KEY (animal_id) REFERENCES animals (id)');
        $this->addSql('ALTER TABLE moults ADD CONSTRAINT FK_81B9A3258E962C16 FOREIGN KEY (animal_id) REFERENCES animals (id)');
        $this->addSql('ALTER TABLE habitat ADD CONSTRAINT FK_3B37B2E88E962C16 FOREIGN KEY (animal_id) REFERENCES animals (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE couplings');
        $this->addSql('DROP TABLE egg_laying');
        $this->addSql('DROP TABLE notes');
        $this->addSql('DROP TABLE moults');
        $this->addSql('DROP TABLE habitat');
    }
}
