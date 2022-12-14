<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221212211345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ass_produit (id INT AUTO_INCREMENT NOT NULL, id_produit_id INT DEFAULT NULL, id_association_id INT DEFAULT NULL, qte INT NOT NULL, INDEX IDX_1642EBACAABEFE2C (id_produit_id), INDEX IDX_1642EBACD2DF75A3 (id_association_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE association (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(10) NOT NULL, email VARCHAR(10) NOT NULL, ville VARCHAR(10) NOT NULL, tel INT NOT NULL, code VARCHAR(10) NOT NULL, local VARCHAR(10) NOT NULL, objectif VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(10) NOT NULL, ref VARCHAR(10) NOT NULL, montant INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vol_produit (id INT AUTO_INCREMENT NOT NULL, id_vol_id INT DEFAULT NULL, id_prod_id INT DEFAULT NULL, montant DOUBLE PRECISION NOT NULL, INDEX IDX_DF64D622B91C4E97 (id_vol_id), INDEX IDX_DF64D622DF559605 (id_prod_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE volontaire (id INT AUTO_INCREMENT NOT NULL, cin VARCHAR(10) NOT NULL, firstname VARCHAR(20) NOT NULL, lastname VARCHAR(20) NOT NULL, email VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ass_produit ADD CONSTRAINT FK_1642EBACAABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE ass_produit ADD CONSTRAINT FK_1642EBACD2DF75A3 FOREIGN KEY (id_association_id) REFERENCES association (id)');
        $this->addSql('ALTER TABLE vol_produit ADD CONSTRAINT FK_DF64D622B91C4E97 FOREIGN KEY (id_vol_id) REFERENCES volontaire (id)');
        $this->addSql('ALTER TABLE vol_produit ADD CONSTRAINT FK_DF64D622DF559605 FOREIGN KEY (id_prod_id) REFERENCES produit (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ass_produit DROP FOREIGN KEY FK_1642EBACAABEFE2C');
        $this->addSql('ALTER TABLE ass_produit DROP FOREIGN KEY FK_1642EBACD2DF75A3');
        $this->addSql('ALTER TABLE vol_produit DROP FOREIGN KEY FK_DF64D622B91C4E97');
        $this->addSql('ALTER TABLE vol_produit DROP FOREIGN KEY FK_DF64D622DF559605');
        $this->addSql('DROP TABLE ass_produit');
        $this->addSql('DROP TABLE association');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE vol_produit');
        $this->addSql('DROP TABLE volontaire');
    }
}
