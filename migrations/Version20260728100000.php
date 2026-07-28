<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260728100000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add poster image, volunteer link and tombola drawing date to festival_settings';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
            ALTER TABLE festival_settings ADD poster_image VARCHAR(255) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE festival_settings ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE festival_settings ADD volunteer_link VARCHAR(255) NOT NULL DEFAULT ''
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE festival_settings ADD tombola_drawing_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT '2026-06-21 17:00:00'
        SQL);
        $this->addSql(<<<'SQL'
            UPDATE festival_settings SET volunteer_link = 'https://forms.gle/ZusMD1pvuYrGxR5g8', tombola_drawing_date = '2026-06-21 17:00:00' WHERE id = 1
        SQL);
    }

    public function down(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
            ALTER TABLE festival_settings DROP poster_image
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE festival_settings DROP updated_at
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE festival_settings DROP volunteer_link
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE festival_settings DROP tombola_drawing_date
        SQL);
    }
}
