<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191210235715 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE epipassager ADD epiavion_id INT NOT NULL');
        $this->addSql('ALTER TABLE epipassager ADD CONSTRAINT FK_965BC871A9145ED9 FOREIGN KEY (epiavion_id) REFERENCES epiavion (id)');
        $this->addSql('CREATE INDEX IDX_965BC871A9145ED9 ON epipassager (epiavion_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE epipassager DROP FOREIGN KEY FK_965BC871A9145ED9');
        $this->addSql('DROP INDEX IDX_965BC871A9145ED9 ON epipassager');
        $this->addSql('ALTER TABLE epipassager DROP epiavion_id');
    }
}
