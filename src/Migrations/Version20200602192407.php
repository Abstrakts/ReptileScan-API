<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200602192407 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE categories ADD value INT DEFAULT NULL');
        $this->addSql('ALTER TABLE animals ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DD12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_966C69DD12469DE2 ON animals (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DD12469DE2');
        $this->addSql('DROP INDEX IDX_966C69DD12469DE2 ON animals');
        $this->addSql('ALTER TABLE animals DROP category_id');
        $this->addSql('ALTER TABLE categories DROP value');
    }
}
