<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220128084858 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE coches (id INT AUTO_INCREMENT NOT NULL, vehiculo_id INT NOT NULL, marca_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, INDEX IDX_9A1141DA25F7D575 (vehiculo_id), INDEX IDX_9A1141DA81EF0041 (marca_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marcas (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE motos (id INT AUTO_INCREMENT NOT NULL, vehiculo_id INT NOT NULL, marca_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, INDEX IDX_BC5434D625F7D575 (vehiculo_id), INDEX IDX_BC5434D681EF0041 (marca_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE otros (id INT AUTO_INCREMENT NOT NULL, vehiculo_id INT NOT NULL, marca_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, INDEX IDX_4501CB9A25F7D575 (vehiculo_id), INDEX IDX_4501CB9A81EF0041 (marca_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE piezas (id INT AUTO_INCREMENT NOT NULL, coches_id INT NOT NULL, motos_id INT NOT NULL, otros_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, tipo VARCHAR(255) NOT NULL, INDEX IDX_CEB62989658D2BFA (coches_id), INDEX IDX_CEB629893869EA14 (motos_id), INDEX IDX_CEB62989C9CCC640 (otros_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehiculo (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE coches ADD CONSTRAINT FK_9A1141DA25F7D575 FOREIGN KEY (vehiculo_id) REFERENCES vehiculo (id)');
        $this->addSql('ALTER TABLE coches ADD CONSTRAINT FK_9A1141DA81EF0041 FOREIGN KEY (marca_id) REFERENCES marcas (id)');
        $this->addSql('ALTER TABLE motos ADD CONSTRAINT FK_BC5434D625F7D575 FOREIGN KEY (vehiculo_id) REFERENCES vehiculo (id)');
        $this->addSql('ALTER TABLE motos ADD CONSTRAINT FK_BC5434D681EF0041 FOREIGN KEY (marca_id) REFERENCES marcas (id)');
        $this->addSql('ALTER TABLE otros ADD CONSTRAINT FK_4501CB9A25F7D575 FOREIGN KEY (vehiculo_id) REFERENCES vehiculo (id)');
        $this->addSql('ALTER TABLE otros ADD CONSTRAINT FK_4501CB9A81EF0041 FOREIGN KEY (marca_id) REFERENCES marcas (id)');
        $this->addSql('ALTER TABLE piezas ADD CONSTRAINT FK_CEB62989658D2BFA FOREIGN KEY (coches_id) REFERENCES coches (id)');
        $this->addSql('ALTER TABLE piezas ADD CONSTRAINT FK_CEB629893869EA14 FOREIGN KEY (motos_id) REFERENCES motos (id)');
        $this->addSql('ALTER TABLE piezas ADD CONSTRAINT FK_CEB62989C9CCC640 FOREIGN KEY (otros_id) REFERENCES otros (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE piezas DROP FOREIGN KEY FK_CEB62989658D2BFA');
        $this->addSql('ALTER TABLE coches DROP FOREIGN KEY FK_9A1141DA81EF0041');
        $this->addSql('ALTER TABLE motos DROP FOREIGN KEY FK_BC5434D681EF0041');
        $this->addSql('ALTER TABLE otros DROP FOREIGN KEY FK_4501CB9A81EF0041');
        $this->addSql('ALTER TABLE piezas DROP FOREIGN KEY FK_CEB629893869EA14');
        $this->addSql('ALTER TABLE piezas DROP FOREIGN KEY FK_CEB62989C9CCC640');
        $this->addSql('ALTER TABLE coches DROP FOREIGN KEY FK_9A1141DA25F7D575');
        $this->addSql('ALTER TABLE motos DROP FOREIGN KEY FK_BC5434D625F7D575');
        $this->addSql('ALTER TABLE otros DROP FOREIGN KEY FK_4501CB9A25F7D575');
        $this->addSql('DROP TABLE coches');
        $this->addSql('DROP TABLE marcas');
        $this->addSql('DROP TABLE motos');
        $this->addSql('DROP TABLE otros');
        $this->addSql('DROP TABLE piezas');
        $this->addSql('DROP TABLE vehiculo');
    }
}
