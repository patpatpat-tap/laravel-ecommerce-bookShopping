# 📸 Image Upload Guide for Laravel Manga Shop

## Where to Upload Images in Laravel

You have **two main options** for storing images in Laravel:

---

## Option 1: Public Directory (Recommended for Development)

**Location:** `public/images/`

### Steps:
1. Create the directory structure:
   ```
   public/
   └── images/
       └── jujutsu-kaisen/
           ├── jujutsu-kaisen-vol-0.jpg
           ├── jujutsu-kaisen-vol-1.jpg
           ├── jujutsu-kaisen-vol-2.jpg
           └── ... (all 10 volumes)
   ```

2. **Access URL:** 
   - Images will be accessible at: `http://127.0.0.1:8000/images/jujutsu-kaisen/jujutsu-kaisen-vol-1.jpg`
   - In your code, use: `/images/jujutsu-kaisen/jujutsu-kaisen-vol-1.jpg`

### Pros:
- ✅ Simple and direct
- ✅ No configuration needed
- ✅ Easy to access

### Cons:
- ❌ Files are publicly accessible (anyone can see the URL)
- ❌ Not ideal for production

---

## Option 2: Storage with Public Link (Recommended for Production)

**Location:** `storage/app/public/images/`

### Steps:

1. **Create the storage link** (if not already done):
   ```bash
   php artisan storage:link
   ```
   This creates a symbolic link from `public/storage` to `storage/app/public`

2. **Create the directory structure:**
   ```
   storage/
   └── app/
       └── public/
           └── images/
               └── jujutsu-kaisen/
                   ├── jujutsu-kaisen-vol-0.jpg
                   ├── jujutsu-kaisen-vol-1.jpg
                   └── ... (all 10 volumes)
   ```

3. **Access URL:**
   - Images will be accessible at: `http://127.0.0.1:8000/storage/images/jujutsu-kaisen/jujutsu-kaisen-vol-1.jpg`
   - In your code, use: `/storage/images/jujutsu-kaisen/jujutsu-kaisen-vol-1.jpg`

### Pros:
- ✅ More secure (can add access control)
- ✅ Better for production
- ✅ Follows Laravel best practices
- ✅ Can use Laravel's Storage facade

### Cons:
- ❌ Requires running `php artisan storage:link`
- ❌ Slightly more complex

---

## 📁 Recommended Directory Structure

For Jujutsu Kaisen volumes, create this structure:

```
public/images/jujutsu-kaisen/
├── jujutsu-kaisen-vol-0.jpg
├── jujutsu-kaisen-vol-1.jpg
├── jujutsu-kaisen-vol-2.jpg
├── jujutsu-kaisen-vol-3.jpg
├── jujutsu-kaisen-vol-4.jpg
├── jujutsu-kaisen-vol-5.jpg
├── jujutsu-kaisen-vol-6.jpg
├── jujutsu-kaisen-vol-7.jpg
├── jujutsu-kaisen-vol-8.jpg
└── jujutsu-kaisen-vol-9.jpg
```

OR (if using storage):

```
storage/app/public/images/jujutsu-kaisen/
├── jujutsu-kaisen-vol-0.jpg
├── jujutsu-kaisen-vol-1.jpg
└── ... (all 10 volumes)
```

---

## 🔧 How to Update the Seeder

The seeder is already configured to use:
```php
'image' => '/images/jujutsu-kaisen/jujutsu-kaisen-vol-1.jpg'
```

**If you want to use storage instead**, change it to:
```php
'image' => '/storage/images/jujutsu-kaisen/jujutsu-kaisen-vol-1.jpg'
```

---

## 📝 Quick Setup Commands

### For Public Directory:
```bash
# Create directory
mkdir -p public/images/jujutsu-kaisen

# Then manually upload your images to:
# public/images/jujutsu-kaisen/
```

### For Storage:
```bash
# Create storage link (if not exists)
php artisan storage:link

# Create directory
mkdir -p storage/app/public/images/jujutsu-kaisen

# Then manually upload your images to:
# storage/app/public/images/jujutsu-kaisen/
```

---

## 🎯 Recommendation

**For Development:** Use `public/images/` (Option 1) - simpler and faster

**For Production:** Use `storage/app/public/` (Option 2) - more secure and follows Laravel conventions

---

## ✅ After Uploading Images

1. Run the seeder:
   ```bash
   php artisan db:seed --class=JujutsuKaisenSeeder
   ```

2. Or run all seeders:
   ```bash
   php artisan db:seed
   ```

3. Check your dashboard - Jujutsu Kaisen should now appear in the featured section!

---

## 📌 Note

The seeder uses placeholder paths. Make sure your image filenames match exactly:
- `jujutsu-kaisen-vol-0.jpg`
- `jujutsu-kaisen-vol-1.jpg`
- etc.

If your images have different names, update the seeder accordingly.

