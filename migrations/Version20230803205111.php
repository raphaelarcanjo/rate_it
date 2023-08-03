<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230803205111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE entertainment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE entertainment_group_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE group_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE entertainment (id INT NOT NULL, title VARCHAR(80) NOT NULL, description VARCHAR(255) DEFAULT NULL, author VARCHAR(80) NOT NULL, release_date DATE NOT NULL, genre VARCHAR(20) DEFAULT NULL, type SMALLINT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE entertainment_group (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE entertainment_group_entertainment (entertainment_group_id INT NOT NULL, entertainment_id INT NOT NULL, PRIMARY KEY(entertainment_group_id, entertainment_id))');
        $this->addSql('CREATE INDEX IDX_FD6255C4C82E0773 ON entertainment_group_entertainment (entertainment_group_id)');
        $this->addSql('CREATE INDEX IDX_FD6255C484F8966A ON entertainment_group_entertainment (entertainment_id)');
        $this->addSql('CREATE TABLE entertainment_group_group (entertainment_group_id INT NOT NULL, group_id INT NOT NULL, PRIMARY KEY(entertainment_group_id, group_id))');
        $this->addSql('CREATE INDEX IDX_B1E5526BC82E0773 ON entertainment_group_group (entertainment_group_id)');
        $this->addSql('CREATE INDEX IDX_B1E5526BFE54D947 ON entertainment_group_group (group_id)');
        $this->addSql('CREATE TABLE "group" (id INT NOT NULL, name VARCHAR(60) NOT NULL, genre VARCHAR(20) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE entertainment_group_entertainment ADD CONSTRAINT FK_FD6255C4C82E0773 FOREIGN KEY (entertainment_group_id) REFERENCES entertainment_group (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE entertainment_group_entertainment ADD CONSTRAINT FK_FD6255C484F8966A FOREIGN KEY (entertainment_id) REFERENCES entertainment (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE entertainment_group_group ADD CONSTRAINT FK_B1E5526BC82E0773 FOREIGN KEY (entertainment_group_id) REFERENCES entertainment_group (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE entertainment_group_group ADD CONSTRAINT FK_B1E5526BFE54D947 FOREIGN KEY (group_id) REFERENCES "group" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE entertainment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE entertainment_group_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE group_id_seq CASCADE');
        $this->addSql('ALTER TABLE entertainment_group_entertainment DROP CONSTRAINT FK_FD6255C4C82E0773');
        $this->addSql('ALTER TABLE entertainment_group_entertainment DROP CONSTRAINT FK_FD6255C484F8966A');
        $this->addSql('ALTER TABLE entertainment_group_group DROP CONSTRAINT FK_B1E5526BC82E0773');
        $this->addSql('ALTER TABLE entertainment_group_group DROP CONSTRAINT FK_B1E5526BFE54D947');
        $this->addSql('DROP TABLE entertainment');
        $this->addSql('DROP TABLE entertainment_group');
        $this->addSql('DROP TABLE entertainment_group_entertainment');
        $this->addSql('DROP TABLE entertainment_group_group');
        $this->addSql('DROP TABLE "group"');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
