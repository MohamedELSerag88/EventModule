<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220427135034 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (   
                                                id INT AUTO_INCREMENT NOT NULL, 
                                                name VARCHAR(255) NOT NULL, 
                                                PRIMARY KEY(id)
                                            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (
                                                id INT AUTO_INCREMENT NOT NULL, 
                                                name VARCHAR(255) NOT NULL,
                                                country_id INT NOT NULL, CONSTRAINT country_id FOREIGN KEY (country_id) REFERENCES country(id), 
                                                PRIMARY KEY(id) 
                                        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event ( 
                                                id INT AUTO_INCREMENT NOT NULL, 
                                                title VARCHAR(255) NOT NULL, 
                                                image VARCHAR(255) DEFAULT NULL, 
                                                description LONGTEXT DEFAULT NULL, 
                                                start_date DATE NOT NULL, 
                                                end_date DATE NOT NULL, 
                                                category VARCHAR(255) NOT NULL, 
                                                country_id INT NOT NULL ,FOREIGN KEY (country_id) REFERENCES country(id), 
                                                city_id INT NOT NULL ,FOREIGN KEY (city_id) REFERENCES city(id), 
                                                PRIMARY KEY(id)
                                            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
                                        );
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
