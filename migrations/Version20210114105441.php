<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210114105441 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE role ADD acteur_id INT NOT NULL, ADD film_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6ADA6F574A FOREIGN KEY (acteur_id) REFERENCES acteur (id)');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6A567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('CREATE INDEX IDX_57698A6ADA6F574A ON role (acteur_id)');
        $this->addSql('CREATE INDEX IDX_57698A6A567F5183 ON role (film_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6ADA6F574A');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6A567F5183');
        $this->addSql('DROP INDEX IDX_57698A6ADA6F574A ON role');
        $this->addSql('DROP INDEX IDX_57698A6A567F5183 ON role');
        $this->addSql('ALTER TABLE role DROP acteur_id, DROP film_id');
    }
}
