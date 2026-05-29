## 📦 Các bước Setup và Chạy Project

### 1. Clone Repository
```bash
git clone https://github.com/leowdzai/shop-laravel.git
cd shop-laravel
```

### 2. Cài đặt Dependencies
```bash
composer install
npm install
```

### 3. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Cấu hình Database
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shop_laravel
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Chạy Migrations
```bash
php artisan migrate
php artisan db:seed
```

### 6. Cấu hình Payment Gateway

#### VNPay
- Đăng ký tại: https://sandbox.vnpayment.vn
- Lấy **TMN Code** và **Hash Secret**
- Cập nhật vào `.env`:
```env
VNPAY_TMN_CODE=your_tmn_code
VNPAY_HASH_SECRET=your_hash_secret
VNPAY_URL=https://sandbox.vnpayment.vn/paygate
VNPAY_RETURN_URL=http://localhost:8000/api/payment/vnpay/callback
```

#### Momo
- Đăng ký tại: https://test-payment.momo.vn
- Lấy **Partner Code**, **Access Key**, **Secret Key**
- Cập nhật vào `.env`:
```env
MOMO_PARTNER_CODE=your_partner_code
MOMO_ACCESS_KEY=your_access_key
MOMO_SECRET_KEY=your_secret_key
MOMO_PUBLIC_KEY=your_public_key
MOMO_ENDPOINT=https://test-payment.momo.vn/v2/gateway/api/create
MOMO_RETURN_URL=http://localhost:8000/api/payment/momo/callback
```

### 7. Tạo Symbolic Link cho Storage
```bash
php artisan storage:link
```

### 8. Chạy Development Server
```bash
php artisan serve
```

Server sẽ chạy tại: http://localhost:8000

## 🔐 Authentication

Sử dụng Laravel Sanctum cho API Authentication:

```bash
php artisan install:api
```

## 🧪 Testing

```bash
php artisan test
```

## 📝 Các tính năng đã implement

✅ **Authentication & Authorization**
- User registration & login
- Sanctum API tokens
- Role-based access control

✅ **Product Management**
- CRUD operations
- Category management
- Image upload

✅ **Shopping Cart & Orders**
- Add to cart
- Create orders
- Order tracking

✅ **Payment Integration**
- VNPay payment gateway
- Momo payment gateway
- Payment verification & callbacks

✅ **Affiliate System**
- Referral links generation
- Commission tracking
- Withdrawal requests
- Dashboard analytics

✅ **Admin Dashboard**
- Order management
- User management
- Affiliate commission management
- Withdrawal approvals

## 🚀 Deployment

### Sử dụng Apache/Nginx:

1. Cài đặt dependencies production
```bash
composer install --optimize-autoloader --no-dev
```

2. Tối ưu production
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

3. Cấu hình Web Server (Apache/Nginx) trỏ đến thư mục `public/`

4. Cấu hình environment production:
```env
APP_ENV=production
APP_DEBUG=false
```

## 📚 Tài liệu API

### Authentication
```bash
POST /login - Đăng nhập
POST /register - Đăng ký
POST /logout - Đăng xuất
```

### Products
```bash
GET /api/products - Danh sách sản phẩm
GET /api/products/{id} - Chi tiết sản phẩm
POST /api/products - Tạo sản phẩm (admin)
PUT /api/products/{id} - Cập nhật sản phẩm (admin)
DELETE /api/products/{id} - Xóa sản phẩm (admin)
```

### Orders
```bash
GET /api/orders - Danh sách đơn hàng
POST /api/orders - Tạo đơn hàng
GET /api/orders/{id} - Chi tiết đơn hàng
POST /api/orders/{id}/checkout - Thanh toán
```

### Affiliate
```bash
GET /api/affiliate/dashboard - Dashboard
GET /api/affiliate/referrals - Danh sách referral
GET /api/affiliate/commissions - Danh sách hoa hồng
POST /api/affiliate/withdraw - Rút tiền
GET /api/affiliate/referral-link - Tạo link referral
```

### Payment
```bash
POST /api/payment/vnpay/create - Tạo thanh toán VNPay
POST /api/payment/momo/create - Tạo thanh toán Momo
```

## ❓ Troubleshooting

### Lỗi "SQLSTATE[HY000]: General error"
→ Chạy: `php artisan migrate:fresh`

### Lỗi "Class not found"
→ Chạy: `composer dumpautoload`

### Lỗi Permission Denied trên storage
→ Chạy: `chmod -R 775 storage bootstrap/cache`

## 🤝 Support

Nếu gặp vấn đề, vui lòng tạo issue trên GitHub hoặc liên hệ support.

---

**Repository**: https://github.com/leowdzai/shop-laravel  
**Last Updated**: 2026-05-29
