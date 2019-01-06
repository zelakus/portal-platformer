# Portal - Platformer

Modül sistemde oyunları tutup, kullanıcıların oyunlardaki skorlarını tutmaktadır. Admin backend üzerinden sisteme yeni oyun ekleyebilir veya skorlar üzerinde değişiklik yapabilir. Api üzerinden oyunculara ait bilgiler veya oyunun skorları da json formatında çekilebilir. http://portal.kouosl/platformer sayfası üzerinde bütün oyunların bir listesi bulunmaktadır. http://portal.kouosl/platformer/game?id=`<oyun-id>` ile ise oyuna ait ana sayfa gösterilmektedir. 

## Kurulum

1. Ana projenin fork edildiği https://github.com/kouosl/portal adresindeki ile aynı kurulum benim fork ettiğim `portal` reposu üzerinde yapılmalıdır.
2. `\portal\vendor\kouosl` klasörü içerisine benim fork ettiğim `portal-theme`, `portal-site` ve ayrıca bu projenin asıl modülü olan `portal-platformer` kopyalanmalıdır. (Google form üzerinde ekstra değişiklik yaptığımız yerler için alan yoktu, ona ait link: https://github.com/zelakus/portal-site )

* `Theme` ve `Site` üzerinde yapılan değişikler gerekli olmaktadır ve ne yapıldığı onlara ait forklanmış sayfalarındaki `readme` üzerinde yazılıdır.


## Kullanım
### Oyuncu
* Modülün http://portal.kouosl/platformer sayfası üzerinden oyun seçilebilir.
![ornek anasayfa](https://media.discordapp.net/attachments/421041738468163585/531556584627765288/unknown.png)

* http://portal.kouosl/platformer/game?id=`<game-id>` üzerinden id'si verilen oyunun sayfası açılır
![ornek oyun](https://media.discordapp.net/attachments/421041738468163585/531556523122622464/unknown.png)

* İçerisindeki place holder olan örnek oyunların başlaması için bir kez oyuna tıklanarak seçili hale getirilmesi gerekmektedir. Sonrasında `space` tuşu ile yükselme sağlanabilir. Top canvas'ın altına deydiğinde oyun kaybedilmiş sayılacak ve skor giriş yapmış kullanıcı adına kaydedilecektir.

### Admin
http://portal.kouosl/phpmyadmin/ adresi üzerinden `games` tablosu ile oyunlar düzenlenebilir veya yeni oyun eklenebilir. Yeni oyun eklendiği zaman modül içerisinde `Asset` olarakta oyuna ait javascript kodu eklenmelidir. `Highscores` tablosu üzerinden ise oyunculara ait skorlar düzenlenebilir.
![ornek admin](https://media.discordapp.net/attachments/421041738468163585/531571509009842178/unknown.png)


## Konsol
Konsoldan erişilebilinen 4 adet komut bulunmaktadır.
```bash
- default                      Gets database info for `platformer` module
    default/game-count         Returns every score
    default/games              Returns games
    default/highscores         Returns highscores
    default/record-count       Returns recorded highscore count
```
#### Örnek konsol görüntüsü:
![ornek konsol](https://media.discordapp.net/attachments/421041738468163585/531562157993754638/unknown.png)

## API
API üzerinde json verisi gönderen 3 adet fonksiyon bulunmaktadır. Sistemdeki orjinal API çalıştırılamadığı için frontend üzerinde viewsiz yeni bir controller üzerinden gelen istekleri işlemeyi tercih ettim. Bu yüzden istek header'ında cookie'de verilmelidir.
#### Örnek API isteği görüntüsü:
![ornek api](https://media.discordapp.net/attachments/421041738468163585/531556643821846568/api_2.png)

#### http://portal.kouosl/platformer/api?gamescores=`<game-id>`
Oyuna ait skorları döndürür.

#### http://portal.kouosl/platformer/api?userscores=`<user-id>`
Oyuncuya ait skorları döndürür.

#### http://portal.kouosl/platformer/api?usergamecount=`<user-id>`
Oyuncunun kaç adet oyunda skoru olduğunu döndürür.



## Lisans
[MIT](https://choosealicense.com/licenses/mit/)