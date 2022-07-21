<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220721141125 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE capacity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bestiary ADD capacity_id INT NOT NULL');
        $this->addSql('ALTER TABLE bestiary ADD CONSTRAINT FK_946DE9FF66B6F0BA FOREIGN KEY (capacity_id) REFERENCES capacity (id)');
        $this->addSql('CREATE INDEX IDX_946DE9FF66B6F0BA ON bestiary (capacity_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bestiary DROP FOREIGN KEY FK_946DE9FF66B6F0BA');
        $this->addSql('DROP TABLE capacity');
        $this->addSql('DROP INDEX IDX_946DE9FF66B6F0BA ON bestiary');
        $this->addSql('ALTER TABLE bestiary DROP capacity_id');
    }
}
