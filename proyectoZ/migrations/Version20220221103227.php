<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220221103227 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE piezas (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehiculos (id INT AUTO_INCREMENT NOT NULL, tipos_id INT NOT NULL, marca_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, INDEX IDX_82CE64A7A3DCB738 (tipos_id), INDEX IDX_82CE64A781EF0041 (marca_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehiculos_piezas (vehiculos_id INT NOT NULL, piezas_id INT NOT NULL, INDEX IDX_379946ACC73BCF43 (vehiculos_id), INDEX IDX_379946ACEEE16CA3 (piezas_id), PRIMARY KEY(vehiculos_id, piezas_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vehiculos ADD CONSTRAINT FK_82CE64A7A3DCB738 FOREIGN KEY (tipos_id) REFERENCES tipos (id)');
        $this->addSql('ALTER TABLE vehiculos ADD CONSTRAINT FK_82CE64A781EF0041 FOREIGN KEY (marca_id) REFERENCES marcas (id)');
        $this->addSql('ALTER TABLE vehiculos_piezas ADD CONSTRAINT FK_379946ACC73BCF43 FOREIGN KEY (vehiculos_id) REFERENCES vehiculos (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vehiculos_piezas ADD CONSTRAINT FK_379946ACEEE16CA3 FOREIGN KEY (piezas_id) REFERENCES piezas (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehiculos_piezas DROP FOREIGN KEY FK_379946ACEEE16CA3');
        $this->addSql('ALTER TABLE vehiculos_piezas DROP FOREIGN KEY FK_379946ACC73BCF43');
        $this->addSql('DROP TABLE piezas');
        $this->addSql('DROP TABLE vehiculos');
        $this->addSql('DROP TABLE vehiculos_piezas');
    }
}
