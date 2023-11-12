 INSERT INTO m_profiles (id,name, kana, age, profile, place, sex, created, modified)
           VALUES (1,"山田　太郎", "ヤマダタロウ", 21, "プロフィール１", 20, 1,now(), now()),
                  (2,"鈴木　一朗", "スズキイチロウ", 33, "プロフィール２", 30, 1,now(), now()),
                  (3,"佐藤　治郎", "サトウジロウ", 23, "プロフィール３", 35, 1,now(), now()); 


 INSERT INTO m_profiles (id,name, kana, age, profile, place, sex, created, modified)
           VALUES (10,"遠藤　航", "エンドウワタル", 29, "プロフィール１０", 7, 1,now(), now());

                  (7,"酒井　宏樹", "サカイヒロキ", 32, "プロフィール７", 24, 1,now(), now()),
                  (8,"谷口　彰吾", "タニグチショウゴ", 33, "プロフィール８", 10, 1,now(), now()),
                  (9,"柴咲　岳", "シバサキガク", 30, "プロフィール９", 18, 1,now(), now()); 
                  (4,"川島　永嗣", "カワシマエイジ", 39, "プロフィール４", 41, 1,now(), now()),
                  (5,"長友　佑都", "ナガトモユウト", 36, "プロフィール５", 38, 1,now(), now()),
                  (6,"吉田　麻也", "ヨシダマヤ", 34, "プロフィール６", 22, 1,now(), now());
                 
       INSERT INTO m_users (user_name, mail_address, password, created, modified)
           VALUES ("Mitoma Kaoru", "mitoma@gmail.com", "123123", now(), now()),
                  ("Machino Shuto", "machino@gmail.com", "123123", now(), now()),
                  ("Soma Yuki", "soma@gmail.com", "123123", now(), now());

CREATE TABLE `m_place` (
 place_no int(11) NOT NULL COMMENT "県NO",
 place_name varchar(100) NOT NULL COMMENT "県名"
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

   INSERT INTO m_place (place_no,place_name)
          VALUES (1,"""""""""北海道"),
                (2,"青森県"),
                (3,"岩手県"),
                (4,"宮城県"),
                (5,"秋田県"),
                (6,"山形県"),
                (7,"福島県"),
                (8,"茨城県"),
                (9,"栃木県"),
                (10,"群馬県"),
                (11,"埼玉県"),
                (12,"千葉県"),
                (13,"東京都"),
                (14,"神奈川県"),
                (15,"新潟県"),
                (16,"富山県"),
                (17,"石川県"),
                (18,"福井県"),
                (19,"山梨県"),
                (20,"長野県"),
                (21,"岐阜県"),
                (22,"静岡県"),
                (23,"愛知県"),
                (24,"三重県"),
                (25,"滋賀県"),
                (26,"京都府"),
                (27,"大阪府"),
                (28,"兵庫県"),
                (29,"奈良県"),
                (30,"和歌山県"),
                (31,"鳥取県"),
                (32,"島根県"),
                (33,"岡山県"),
                (34,"広島県"),
                (35,"山口県"),
                (36,"徳島県"),
                (37,"香川県"),
                (38,"愛媛県"),
                (39,"高知県"),
                (40,"福岡県"),
                (41,"佐賀県"),
                (42,"長崎県"),
                (43,"熊本県"),
                (44,"大分県"),
                (45,"宮崎県"),
                (46,	"鹿児島県"),
                (47,"沖縄県");



                
   