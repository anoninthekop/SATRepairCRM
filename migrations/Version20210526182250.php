<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210526182250 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(30) NOT NULL, description LONGTEXT DEFAULT NULL, modified DATETIME NOT NULL, created DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', fullname VARCHAR(50) NOT NULL, address VARCHAR(100) DEFAULT NULL, city VARCHAR(30) DEFAULT NULL, email VARCHAR(50) DEFAULT NULL, zip_code INT DEFAULT NULL, phone INT NOT NULL, modified DATETIME NOT NULL, created DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(30) NOT NULL, amount INT NOT NULL, price DOUBLE PRECISION DEFAULT NULL, modified DATETIME NOT NULL, created DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repair (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', customer_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', category_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', status_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', code VARCHAR(13) NOT NULL, imei VARCHAR(17) DEFAULT NULL, pattern VARCHAR(30) DEFAULT NULL, fault LONGTEXT NOT NULL, colour VARCHAR(7) DEFAULT NULL, private_comment LONGTEXT DEFAULT NULL, public_comment LONGTEXT DEFAULT NULL, labour_price DOUBLE PRECISION DEFAULT NULL, tax DOUBLE PRECISION DEFAULT NULL, visible TINYINT(1) NOT NULL, modified DATETIME NOT NULL, created DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_8EE4342177153098 (code), INDEX IDX_8EE434219395C3F3 (customer_id), INDEX IDX_8EE4342112469DE2 (category_id), INDEX IDX_8EE434216BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repair_products (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', repair CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', product CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', quantity INT NOT NULL, created DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_DA2223F18EE43421 (repair), INDEX IDX_DA2223F1D34A04AD (product), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(30) NOT NULL, colour VARCHAR(7) DEFAULT NULL, modified DATETIME NOT NULL, created DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_7B00651C5E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', username VARCHAR(30) NOT NULL, email VARCHAR(50) DEFAULT NULL, password LONGTEXT NOT NULL, roles JSON NOT NULL, last_session DATETIME DEFAULT NULL, modified DATETIME NOT NULL, created DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE repair ADD CONSTRAINT FK_8EE434219395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE repair ADD CONSTRAINT FK_8EE4342112469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE repair ADD CONSTRAINT FK_8EE434216BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE repair_products ADD CONSTRAINT FK_DA2223F18EE43421 FOREIGN KEY (repair) REFERENCES repair (id)');
        $this->addSql('ALTER TABLE repair_products ADD CONSTRAINT FK_DA2223F1D34A04AD FOREIGN KEY (product) REFERENCES product (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair DROP FOREIGN KEY FK_8EE4342112469DE2');
        $this->addSql('ALTER TABLE repair DROP FOREIGN KEY FK_8EE434219395C3F3');
        $this->addSql('ALTER TABLE repair_products DROP FOREIGN KEY FK_DA2223F1D34A04AD');
        $this->addSql('ALTER TABLE repair_products DROP FOREIGN KEY FK_DA2223F18EE43421');
        $this->addSql('ALTER TABLE repair DROP FOREIGN KEY FK_8EE434216BF700BD');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE repair');
        $this->addSql('DROP TABLE repair_products');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE user');
    }
}
