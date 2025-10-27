# 📋 HSE Report System - User Guide

## 🎯 Fitur Utama

Sistem ini menyediakan:
1. ✅ **Form Input Data HSE** - Form lengkap dengan dummy values yang berubah setiap refresh
2. ✅ **Dashboard Report** - Tampilan modern dan responsif dari data HSE
3. ✅ **Database Storage** - Semua data tersimpan di database SQLite
4. ✅ **Random Dummy Data** - Generate nilai random setiap kali refresh halaman form

---

## 🚀 Cara Menggunakan

### 1️⃣ **Mengakses Halaman Utama**
```
http://localhost:8000/
```
- Menampilkan HSE Report terbaru dari database
- Jika belum ada data, akan menampilkan data sample
- Tampilan modern dengan gradient dan animasi

### 2️⃣ **Menambah Data Baru (Form)**
```
http://localhost:8000/form
```

**Atau klik tombol "➕ Add New Report" di pojok kanan bawah halaman utama**

#### Fitur Form:
- ✨ **Auto-filled Dummy Values** - Semua field sudah terisi otomatis
- 🔄 **Random pada setiap refresh** - Klik tombol "🔄 Refresh Random Values" atau refresh browser
- 📊 **Lengkap dengan semua section**:
  - Basic Information
  - Manhours & Personnel
  - Training & Development
  - HSE Activities
  - Incidents & KPIs
  - HSE Leading Indicators (5 items)
  - HSE Lagging Indicators (14 items)
  - HSE Deliverables Status (10 items)
  - Permit to Work Statistics (5 items)
  - HSE Achievement (5 items)
  - Additional HSE Data (4 items)

### 3️⃣ **Submit Data**
1. Review semua data yang sudah terisi
2. Ubah nilai jika diperlukan
3. Klik tombol **"💾 Submit Report"**
4. Data akan tersimpan ke database
5. Redirect otomatis ke halaman utama dengan pesan sukses

---

## 📊 Data yang Tersimpan

### Fields Utama:
- Month
- Project Start Date
- Days Completed
- Total Manhours
- Persons Inducted
- Training Statistics
- HSE Observations
- Meetings & Activities
- Incidents & KPIs (TRCF, LTIFR)

### Data JSON (Complex):
- Leading Indicators (Array of objects)
- Lagging Indicators (Array of objects)
- Deliverables Status (Array of objects)
- Permit to Work Stats (Array of objects)
- HSE Achievement (Array of objects)
- Additional HSE Data (Array of objects)

---

## 🎲 Random Dummy Values

Setiap kali halaman form di-refresh, nilai-nilai berikut akan berubah:

| Field | Range |
|-------|-------|
| Month | Jan-25 hingga Dec-25 |
| Project Start Date | 100-500 hari yang lalu |
| Days Completed | 100-500 |
| Total Manhours | 50,000-200,000 |
| Persons Inducted | 200-800 |
| Training Conducted | 15-50 |
| Training Hours | 100-500 |
| HSE Observations | 500-2,000 |
| Leading Indicators (Oct) | 1-50 |
| Leading Indicators (YTD) | 10-200 |
| Leading Indicators (ITD) | 50-500 |
| Lagging Indicators | 0-5 (monthly), 0-100 (ITD) |
| TRCF/LTIFR | 0.0-5.0 |
| Achievement Values | 100-50,000 |

---

## 🎨 Tampilan

### Dashboard (Halaman Utama)
- ✨ Modern gradient design
- 📱 Responsive layout
- 🎯 4-column grid layout
- 🔵 Blue color scheme
- ⚡ Smooth animations
- 📊 Data visualization

### Form (Halaman Input)
- 📝 Clean and organized sections
- 🎨 Color-coded headers
- 📊 Table-based inputs untuk data kompleks
- 💾 Easy submission
- ↩️ Cancel button untuk kembali

---

## 🗄️ Database Structure

**Table: `hse_reports`**

```sql
- id (Primary Key)
- month (string)
- project_start_date (date)
- days_completed (integer)
- total_manhours (integer)
- total_manhours_with_lti (integer)
- persons_inducted (integer)
- training_conducted (integer)
- training_hours (integer)
- hse_observations (integer)
- hse_meeting (integer)
- permit_to_work (integer)
- knowledge_share (integer)
- leadership_tour (integer)
- audit (integer)
- accident_incident (integer)
- trcf (decimal)
- ltifr (decimal)
- scope_of_works (text)
- leading_indicators (json)
- lagging_indicators (json)
- deliverables_status (json)
- permit_to_work_stats (json)
- hse_achievement (json)
- additional_hse_data (json)
- created_at (timestamp)
- updated_at (timestamp)
```

---

## 🔧 Routes

| Method | URL | Name | Description |
|--------|-----|------|-------------|
| GET | `/` | hse-report-exact-match | Dashboard utama |
| GET | `/form` | hse-report.create | Form input data |
| POST | `/store` | hse-report.store | Submit form |

---

## 💡 Tips & Tricks

1. **Generate Data Baru**: Refresh halaman form berkali-kali untuk mendapatkan variasi data
2. **Quick Submit**: Karena semua field sudah terisi, tinggal klik Submit
3. **Review Data**: Halaman utama selalu menampilkan data terbaru yang di-submit
4. **Success Message**: Pesan sukses akan hilang otomatis setelah 5 detik

---

## 🎯 Workflow Penggunaan

```
1. Buka http://localhost:8000/form
   ↓
2. Review/Edit dummy values (atau langsung submit)
   ↓
3. Klik "💾 Submit Report"
   ↓
4. Redirect ke http://localhost:8000/
   ↓
5. Lihat data terbaru di dashboard
```

---

## 🐛 Troubleshooting

### Database Error?
```bash
php artisan migrate:fresh
```

### Form tidak submit?
- Check browser console untuk JavaScript errors
- Pastikan CSRF token valid
- Check network tab untuk request details

### Data tidak muncul di dashboard?
- Submit minimal 1 form terlebih dahulu
- Check database: `SELECT * FROM hse_reports`

---

## 📝 Contoh Data Submit

Ketika Anda submit form, data akan tersimpan dalam format:

**Basic Fields**: Langsung ke kolom database
**Complex Data (JSON)**: Tersimpan dalam format array of objects

```json
{
  "leading_indicators": [
    {"description": "#Project HSE SLT", "oct25": "15", "ytd": "120", "itd": "450"},
    ...
  ],
  "lagging_indicators": [...],
  "deliverables_status": [...],
  "permit_to_work_stats": [...],
  "hse_achievement": [...],
  "additional_hse_data": [...]
}
```

---

## ✨ Fitur Bonus

- 🎨 **Modern UI/UX**: Gradient backgrounds, smooth transitions
- 📱 **Responsive Design**: Works on all screen sizes
- ⚡ **Fast Performance**: Optimized queries and rendering
- 🔄 **Auto-refresh Ready**: Random values on every page load
- 💾 **Data Persistence**: All data saved to SQLite database
- ✅ **Success Feedback**: Clear success messages with auto-hide

---

## 🎉 Selamat Menggunakan!

Sistem HSE Report ini siap digunakan. Tinggal:
1. Akses form
2. Submit (data sudah terisi otomatis)
3. Lihat hasil di dashboard

**Happy Reporting! 🚀**

