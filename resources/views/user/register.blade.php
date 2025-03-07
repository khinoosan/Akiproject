<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <h1 class="mt-4">ユーザー登録</h1>

            
                <div class="alert alert-danger" style="display: none;">
                    <ul>
                 
                    </ul>
                </div>

                <form action="#" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">氏名 (Name):</label>
                        <input type="text" id="name" name="name" required class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">メールアドレス (Email):</label>
                        <input type="email" id="email" name="email" required class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">パスワード (Password):</label>
                        <input type="password" id="password" name="password" required class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">登録</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
