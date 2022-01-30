<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220130144117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE marcas (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE piezas (id INT AUTO_INCREMENT NOT NULL, vehiculos_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, INDEX IDX_CEB62989C73BCF43 (vehiculos_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipos (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehiculos (id INT AUTO_INCREMENT NOT NULL, tipos_id INT NOT NULL, marca_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, INDEX IDX_82CE64A7A3DCB738 (tipos_id), INDEX IDX_82CE64A781EF0041 (marca_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE piezas ADD CONSTRAINT FK_CEB62989C73BCF43 FOREIGN KEY (vehiculos_id) REFERENCES vehiculos (id)');
        $this->addSql('ALTER TABLE vehiculos ADD CONSTRAINT FK_82CE64A7A3DCB738 FOREIGN KEY (tipos_id) REFERENCES tipos (id)');
        $this->addSql('ALTER TABLE vehiculos ADD CONSTRAINT FK_82CE64A781EF0041 FOREIGN KEY (marca_id) REFERENCES marcas (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehiculos DROP FOREIGN KEY FK_82CE64A781EF0041');
        $this->addSql('ALTER TABLE vehiculos DROP FOREIGN KEY FK_82CE64A7A3DCB738');
        $this->addSql('ALTER TABLE piezas DROP FOREIGN KEY FK_CEB62989C73BCF43');
        $this->addSql('DROP TABLE marcas');
        $this->addSql('DROP TABLE piezas');
        $this->addSql('DROP TABLE tipos');
        $this->addSql('DROP TABLE vehiculos');
    }
}
