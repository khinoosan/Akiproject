<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー管理</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <h1 class="mt-4">ユーザー管理</h1>

                <a href="#" class="btn btn-primary mb-3">ユーザー登録</a>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>名前</th>
                            <th>Email</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    
                        <tr>
                            <td>山田太郎</td>
                            <td>yamada@example.com</td>
                            <td>
                                <form action="#" method="POST" style="display:inline;">
                                    <button type="submit" class="btn btn-danger btn-sm">削除</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>佐藤花子</td>
                            <td>sato@example.com</td>
                            <td>
                                <form action="#" method="POST" style="display:inline;">
                                    <button type="submit" class="btn btn-danger btn-sm">削除</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
