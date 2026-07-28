<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260728090000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create festival_settings table (singleton row for the countdown start/end dates)';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
            CREATE TABLE festival_settings (id SERIAL NOT NULL, start_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, end_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO festival_settings (id, start_date, end_date) VALUES (1, '2026-06-15 08:00:00', '2026-06-21 08:00:00')
        SQL);
        $this->addSql(<<<'SQL'
            SELECT setval('festival_settings_id_seq', 1)
        SQL);
    }

    public function down(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
            DROP TABLE festival_settings
        SQL);
    }
}
