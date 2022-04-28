<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220427230109 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY country_id');
        $this->addSql('DROP INDEX country_id ON city');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY event_ibfk_2');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY event_ibfk_1');
        $this->addSql('DROP INDEX country_id ON event');
        $this->addSql('DROP INDEX city_id ON event');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE category');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT country_id FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX country_id ON city (country_id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT event_ibfk_2 FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT event_ibfk_1 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX country_id ON event (country_id)');
        $this->addSql('CREATE INDEX city_id ON event (city_id)');
    }
}
