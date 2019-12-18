<? Php
include ( ' config / config.php ' );
if ( tanımlı ( ' devre dışı bırakma ' ) &&  devre dışı bırakma {
şunları içerir ( ' noservice.html ' );
Çıkış ;
}
dahil ( ' fonksiyonlar / db.php ' );
dahil et ( ' functions / settings.php ' );
Require_once ( ' kütüphaneleri / Smarty.class.php ' );
   $ get_query  =  yeni  kurulum ;
$ db1  =  yeni  db ;
$ db1 -> bağlan ();
mysqli_select_db ( $ GLOBALS [ ' __Connect ' ], database_portfolio );
$ query_users_db  =  sprintf ( " SEÇ  *  DAN user_streams WHERE kullanıcı = % s ve ITEM_ID = % s " , $ db1 -> GetSQLValueString ( $ _ SESSION [ sha1 ( $ _SERVER [ ' DOCUMENT_ROOT ' ] . site_root )], ' metin ' ), $ db1 -> GetSQLValueString ( $ _GET [ ' id ' ], ' int' ));
$ users_db  =  mysqli_query ( $ GLOBALS [ ' __Connect ' ], $ query_users_db ) veya  ölün (mysqli_error ( $ GLOBALS [ ' __Connect ' ]));
$ row_users_db  =  mysqli_fetch_assoc ( $ users_db );
$ totalRows_users_db  = mysqli_num_rows ( $ users_db );
if ( $ totalRows_users_db  ==  0 ) {
? >
<? Php
eğer ( $ totalRows_users_db  == 0 )
{
eğer ( 1  == 1 ) {
mysqli_select_db ( $ GLOBALS [ ' __Connect ' ], database_portfolio );
if ( isset ( $ _GET [ ' type ' ]) &&  $ _GET [ ' type ' ] ==  ' canlı ' )
{
$ query_users_db  =  sprintf ( " SEÇ  *  DAN canlı WHERE id = % s " , $ db1 -> GetSQLValueString ( $ _GET [ ' id ' ], ' int ' ));}
başka {
$ query_users_db  =  sprintf ( " SEÇ  *  DAN videolar WHERE id = % s " , $ db1 -> GetSQLValueString ( $ _GET [ ' id ' ], ' int ' ));}
$ users_db  =  mysqli_query ( $ GLOBALS [ ' __Connect ' ], $ query_users_db ) veya  ölün (mysqli_error ( $ GLOBALS [ ' __Connect ' ]));
$ row_users_db  =  mysqli_fetch_assoc ( $ users_db );
$ totalRows_users_db  = mysqli_num_rows ( $ users_db );
 
 if ( isset ( $ _GET [ ' type ' ]) &&  $ _GET [ ' type ' ] ==  ' canlı ' )
{
 
 @ $ list5  =  ' #EXTINF: -1 tvg-id = " ' . $ örneğin . ' " tvg-name = " ' . trim ( preg_replace ( '/ \ s * \ ( [^)] * \) /' , ' ' , str_replace ( ' | SD ' , ' ' , str_replace ( ' | HD ' , ' ' , str_replace ( ' , ' ,'' , $ row_users_db [ ' name ' ])))))) . ' "tvg-logo =" ' . $ row_users_db [ ' image ' ] . ' "group-title =" Canlı-Tv: ' . $ row_users_db [ ' seri ' ] . ' ", ' . str_replace ( ' , ' , ' ' , kırpma ( preg_replace ( '[^)] * \) / ' , ' ' , str_replace ( ' | SD ' , ' ' , str_replace ( ' | HD ' , ' ' , str_replace ( ' , ' , ' ' , $ row_users_db [ ' name ' ]) ))))) . '
' . ' http: // ' . $ _SERVER [ ' HTTP_HOST ' ] . site_root . ' /stream-live.php/video.m3u8?url= ' . $ row_users_db [ ' id ' ] . ' -User ' . '
' ;
}
başka {
 @ $ list5  =  ' #EXTINF: -1 tvg-id = " ' . $ örneğin . ' " tvg-name = " ' . trim ( preg_replace ( '/ \ s * \ ( [^)] * \) /' , ' ' , str_replace ( ' | SD ' , ' ' , str_replace ( ' | HD ' , ' ' , str_replace ( ' , ' ,'' , $ row_users_db [ ' name ' ])))))) . ' "tvg-logo =" ' . $ row_users_db [ ' image ' ] . ' "group-title =" Canlı-Tv: ' . $ row_users_db [ ' seri ' ] . ' ", ' . str_replace ( ' , ' , ' ' , kırpma ( preg_replace ( '[^)] * \) / ' , ' ' , str_replace ( ' | SD ' , ' ' , str_replace ( ' | HD ' , ' ' , str_replace ( ' , ' , ' ' , $ row_users_db [ ' name ' ]) ))))) . '
' . ' http: // ' . $ _SERVER [ ' HTTP_HOST ' ] . site_root . ' /stream.php/video.mp4?url= ' . $ row_users_db [ ' id ' ] . ' -User ' . '
' ;
}
$ insertSQL  =  sprintf ( " INSERT IN_ user_streams (isim, item_id, kod, görünümler, m3u, ` type` , `limit` , kullanıcı) DEĞERLER (% s,% s,% s,% s,% s,% s, % s,% s) " ,
                       $ db1 -> GetSQLValueString ( $ row_users_db [ ' name ' ], " metin " ),
                       $ db1 -> GetSQLValueString ( $ row_users_db [ ' id ' ], " metin " ),
                       $ db1 -> GetSQLValueString ( $ list5 . '  ' , " metin " ),
                       $ db1 -> GetSQLValueString ( 0 , " int " ),
                       $ db1 -> GetSQLValueString ( 0 , " int " ),
                       $ db1 -> GetSQLValueString ( ' video ' , " metin " ),
                       $ db1 -> GetSQLValueString ( ' yanlış ' , " metin " ),
                       $ db1 -> GetSQLValueString ( $ _SESSION [ sha1 ( $ _SERVER [ ' DOCUMENT_ROOT ' ] . site_root )], " metin " ));
  
  
  mysqli_query ( $ GLOBALS [ ' __Connect ' ], $ insertSQL ) veya  ölün (mysqli_error ( $ GLOBALS [ ' __Connect ' ]));
? > {
  "Eklendi": "Gerçek",
  "status": "başarı"
}
<? php } başka { ? > {
  "Eklendi": "Yanlış",
  "status": "Bu hizmet doğrudan bir hizmet değildir. Lütfen desteğe başvurun"
} <? php }} başka
{ ? > {
  "Eklendi": "Yanlış",
  "status": "ürün bulunamadı"
} <? php
}
} başka { ? > {
  "Eklendi": "Yanlış",
  "status": "Zaten sepet içinde"
} <? php } ? >