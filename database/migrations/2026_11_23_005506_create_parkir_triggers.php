<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Trigger saat kendaraan MASUK (otomatis tambah kolom 'terisi')
        DB::unprepared('
            CREATE TRIGGER kurangi_kapasitas_parkir
            AFTER INSERT ON tb_transaksi
            FOR EACH ROW
            BEGIN
                IF LOWER(NEW.status) = "masuk" THEN
                    UPDATE tb_area_parkir 
                    SET terisi = terisi + 1 
                    WHERE id_area = NEW.id_area;
                END IF;
            END
        ');

        // 2. Trigger saat kendaraan KELUAR (otomatis kurangi kolom 'terisi')
        DB::unprepared('
            CREATE TRIGGER tambah_kapasitas_parkir
            AFTER UPDATE ON tb_transaksi
            FOR EACH ROW
            BEGIN
                IF LOWER(OLD.status) = "masuk" AND LOWER(NEW.status) = "keluar" THEN
                    UPDATE tb_area_parkir 
                    SET terisi = GREATEST(0, terisi - 1)
                    WHERE id_area = NEW.id_area;
                END IF;
            END
        ');
    }

    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS kurangi_kapasitas_parkir');
        DB::unprepared('DROP TRIGGER IF EXISTS tambah_kapasitas_parkir');
    }
};