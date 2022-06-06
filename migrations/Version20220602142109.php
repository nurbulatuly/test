<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220602142109 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE attribute_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE crypto_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE currency_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE attribute (id INT NOT NULL, currency_id INT DEFAULT NULL, price NUMERIC(10, 0) NOT NULL, last_update INT NOT NULL, last_volume NUMERIC(10, 0) NOT NULL, last_volume_to NUMERIC(10, 0) NOT NULL, open_day NUMERIC(10, 0) NOT NULL, high_day NUMERIC(10, 0) NOT NULL, low_day NUMERIC(10, 0) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FA7AEFFB38248176 ON attribute (currency_id)');
        $this->addSql('CREATE TABLE crypto (id INT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE currency (id INT NOT NULL, crypto_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6956883FE9571A63 ON currency (crypto_id)');
        $this->addSql('ALTER TABLE attribute ADD CONSTRAINT FK_FA7AEFFB38248176 FOREIGN KEY (currency_id) REFERENCES currency (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE currency ADD CONSTRAINT FK_6956883FE9571A63 FOREIGN KEY (crypto_id) REFERENCES crypto (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE currency DROP CONSTRAINT FK_6956883FE9571A63');
        $this->addSql('ALTER TABLE attribute DROP CONSTRAINT FK_FA7AEFFB38248176');
        $this->addSql('DROP SEQUENCE attribute_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE crypto_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE currency_id_seq CASCADE');
        $this->addSql('DROP TABLE attribute');
        $this->addSql('DROP TABLE crypto');
        $this->addSql('DROP TABLE currency');
    }
}
