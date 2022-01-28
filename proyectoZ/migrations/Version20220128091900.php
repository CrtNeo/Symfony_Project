<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220128091900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE piezas DROP FOREIGN KEY FK_CEB62989658D2BFA');
        $this->addSql('ALTER TABLE piezas DROP FOREIGN KEY FK_CEB629893869EA14');
        $this->addSql('ALTER TABLE piezas DROP FOREIGN KEY FK_CEB62989C9CCC640');
        $this->addSql('ALTER TABLE coches DROP FOREIGN KEY FK_9A1141DA25F7D575');
        $this->addSql('ALTER TABLE motos DROP FOREIGN KEY FK_BC5434D625F7D575');
        $this->addSql('ALTER TABLE otros DROP FOREIGN KEY FK_4501CB9A25F7D575');
        $this->addSql('CREATE TABLE tipos (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehiculos (id INT AUTO_INCREMENT NOT NULL, tipos_id INT NOT NULL, marca_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, INDEX IDX_82CE64A7A3DCB738 (tipos_id), INDEX IDX_82CE64A781EF0041 (marca_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vehiculos ADD CONSTRAINT FK_82CE64A7A3DCB738 FOREIGN KEY (tipos_id) REFERENCES tipos (id)');
        $this->addSql('ALTER TABLE vehiculos ADD CONSTRAINT FK_82CE64A781EF0041 FOREIGN KEY (marca_id) REFERENCES marcas (id)');
        $this->addSql('DROP TABLE coches');
        $this->addSql('DROP TABLE motos');
        $this->addSql('DROP TABLE otros');
        $this->addSql('DROP TABLE vehiculo');
        $this->addSql('DROP INDEX IDX_CEB629893869EA14 ON piezas');
        $this->addSql('DROP INDEX IDX_CEB62989658D2BFA ON piezas');
        $this->addSql('DROP INDEX IDX_CEB62989C9CCC640 ON piezas');
        $this->addSql('ALTER TABLE piezas ADD vehiculos_id INT NOT NULL, DROP coches_id, DROP motos_id, DROP otros_id, DROP tipo');
        $this->addSql('ALTER TABLE piezas ADD CONSTRAINT FK_CEB62989C73BCF43 FOREIGN KEY (vehiculos_id) REFERENCES vehiculos (id)');
        $this->addSql('CREATE INDEX IDX_CEB62989C73BCF43 ON piezas (vehiculos_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehiculos DROP FOREIGN KEY FK_82CE64A7A3DCB738');
        $this->addSql('ALTER TABLE piezas DROP FOREIGN KEY FK_CEB62989C73BCF43');
        $this->addSql('CREATE TABLE coches (id INT AUTO_INCREMENT NOT NULL, vehiculo_id INT NOT NULL, marca_id INT NOT NULL, nombre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_9A1141DA25F7D575 (vehiculo_id), INDEX IDX_9A1141DA81EF0041 (marca_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE motos (id INT AUTO_INCREMENT NOT NULL, vehiculo_id INT NOT NULL, marca_id INT NOT NULL, nombre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_BC5434D625F7D575 (vehiculo_id), INDEX IDX_BC5434D681EF0041 (marca_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE otros (id INT AUTO_INCREMENT NOT NULL, vehiculo_id INT NOT NULL, marca_id INT NOT NULL, nombre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_4501CB9A25F7D575 (vehiculo_id), INDEX IDX_4501CB9A81EF0041 (marca_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE vehiculo (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE coches ADD CONSTRAINT FK_9A1141DA25F7D575 FOREIGN KEY (vehiculo_id) REFERENCES vehiculo (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE coches ADD CONSTRAINT FK_9A1141DA81EF0041 FOREIGN KEY (marca_id) REFERENCES marcas (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE motos ADD CONSTRAINT FK_BC5434D625F7D575 FOREIGN KEY (vehiculo_id) REFERENCES vehiculo (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE motos ADD CONSTRAINT FK_BC5434D681EF0041 FOREIGN KEY (marca_id) REFERENCES marcas (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE otros ADD CONSTRAINT FK_4501CB9A25F7D575 FOREIGN KEY (vehiculo_id) REFERENCES vehiculo (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE otros ADD CONSTRAINT FK_4501CB9A81EF0041 FOREIGN KEY (marca_id) REFERENCES marcas (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE tipos');
        $this->addSql('DROP TABLE vehiculos');
        $this->addSql('DROP INDEX IDX_CEB62989C73BCF43 ON piezas');
        $this->addSql('ALTER TABLE piezas ADD motos_id INT NOT NULL, ADD otros_id INT NOT NULL, ADD tipo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE vehiculos_id coches_id INT NOT NULL');
        $this->addSql('ALTER TABLE piezas ADD CONSTRAINT FK_CEB629893869EA14 FOREIGN KEY (motos_id) REFERENCES motos (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE piezas ADD CONSTRAINT FK_CEB62989658D2BFA FOREIGN KEY (coches_id) REFERENCES coches (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE piezas ADD CONSTRAINT FK_CEB62989C9CCC640 FOREIGN KEY (otros_id) REFERENCES otros (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_CEB629893869EA14 ON piezas (motos_id)');
        $this->addSql('CREATE INDEX IDX_CEB62989658D2BFA ON piezas (coches_id)');
        $this->addSql('CREATE INDEX IDX_CEB62989C9CCC640 ON piezas (otros_id)');
    }
}
