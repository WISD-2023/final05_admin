# 系統畫面
  首頁
  ![](https://i.imgur.com/0xokqXV.jpeg)
  開設討論區
  ![](https://i.imgur.com/kjifCIU.jpeg)
  投票清單
  ![](https://i.imgur.com/yyMjbhI.jpeg)
  檢舉清單
  ![](https://i.imgur.com/23JmgqZ.jpeg)
  黑名單
  ![](https://i.imgur.com/yrWI2d3.jpeg)
  其他均與使用者端相同
# 系統的主要功能
  使用者端均為[3B032089 阮彥翔](https://github.com/3B032089)
  * 首頁 Route::get('Home', [HomeConrtroller::class,'index'])->name('Home');
  * 討論區 Route::get('Forum/{forumName}', [ForumController::class,'show'])->name('Forum');
  * 文章 Route::get('Article/{articleName}', [ArticleController::class,'show'])->name('Article');
  * 刪除文章 Route::delete('Article', [ArticleController::class,'destroy'])->name('Article.destroy');
  * 刪除留言 Route::delete('Comment', [CommentsController::class,'destroy'])->name('Comment.destroy');
  * 投票清單 Route::post('VotelistShow',[VoteController::class,'show'])->name('Vote.show');
  * 批准 Route::patch('Vote',[VoteController::class,'update'])->name('Vote.update');
  * 檢舉清單 Route::get('ReportShow',[ReportController::class,'show'])->name('Report.show');
  * 封鎖使用者 Route::patch('Userblock',[UserBlockController::class,'block'])->name('UserBlock.block');
  * 解除封鎖使用者 Route::get('UserUnblock',[UserBlockController::class,'Unblock'])->name('UserBlock.Unblock');
# ERD
   ![](https://i.imgur.com/bd0q2X7.jpg)
# 關聯式綱要圖綱要圖
   ![](https://i.imgur.com/fh2dE38.jpeg)
   ![](https://i.imgur.com/io2SllQ.jpeg)
# 初始專案與DB負責的同學
   * 初始專案 [3B032089 阮彥翔](https://github.com/3B032089)
   * DB [3B032080 謝東霖](https://github.com/3B032080)、[3B032089 阮彥翔](https://github.com/3B032089)
# 系統測試資料存放位置
   根目錄的forum
# 系統使用者測試帳號
   使用者端：
      * 帳號：Yaesakura716207@gmail.com
      * 密碼：Tsukasa716207
   管理員端：
      * 帳號：fuuzuki0307@gmail.com
      * 密碼：Tsukasa1600
# 系統開發人員與工作分配
   * 使用者端：[3B032089 阮彥翔](https://github.com/3B032089)
   * 管理員端：[3B032080 謝東霖](https://github.com/3B032080)
