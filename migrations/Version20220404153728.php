<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220404153728 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cotizacion (id INT AUTO_INCREMENT NOT NULL, empresa_id INT NOT NULL, fecha DATETIME NOT NULL, valor DOUBLE PRECISION NOT NULL, INDEX IDX_empresa_id (empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE empresa (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, sector VARCHAR(255) DEFAULT NULL, direccion VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, destacada TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cotizacion ADD CONSTRAINT FK_empresa_id FOREIGN KEY (empresa_id) REFERENCES empresa (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cotizacion DROP FOREIGN KEY FK_empresa_id');
        $this->addSql('DROP TABLE cotizacion');
        $this->addSql('DROP TABLE empresa');
    }
}
