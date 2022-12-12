<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221207142002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE card_content ADD fk_university INT NOT NULL, ADD fk_subject INT NOT NULL');
        $this->addSql('DROP INDEX fk_student ON review');
        $this->addSql('DROP INDEX fk_user_id ON student');
        $this->addSql('DROP INDEX fk_university ON tut_unit');
        $this->addSql('DROP INDEX fk_student ON tut_unit');
        $this->addSql('DROP INDEX fk_subject ON tut_unit');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE card_content DROP fk_university, DROP fk_subject');
        $this->addSql('CREATE INDEX fk_student ON review (fk_student)');
        $this->addSql('CREATE INDEX fk_user_id ON student (fk_user_id)');
        $this->addSql('CREATE INDEX fk_university ON tut_unit (fk_university)');
        $this->addSql('CREATE INDEX fk_student ON tut_unit (fk_student)');
        $this->addSql('CREATE INDEX fk_subject ON tut_unit (fk_subject)');
    }
}
