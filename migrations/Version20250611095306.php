<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250611095306 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }


    public function up(Schema $schema): void
    {
        $this->addSql("INSERT INTO pokoje (Wymiar, Cena, Przeznaczenie) VALUES (20, 150, 'Single')");
        $this->addSql("INSERT INTO pokoje (Wymiar, Cena, Przeznaczenie) VALUES (35, 250, 'Double')");
        $this->addSql("INSERT INTO pokoje (Wymiar, Cena, Przeznaczenie) VALUES (50, 400, 'Family')");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DELETE FROM pokoje WHERE Przeznaczenie IN ('Single', 'Double', 'Family')");
    }
}


