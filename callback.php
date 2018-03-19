<?php
$accessToken = '';


//ユーザーからのメッセージ取得
$json_string = file_get_contents('php://input');
$jsonObj = json_decode($json_string);

$type = $jsonObj->{"events"}[0]->{"message"}->{"type"};
//メッセージ取得
$text = $jsonObj->{"events"}[0]->{"message"}->{"text"};
//ReplyToken取得
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};

//メッセージ以外のときは何も返さず終了
if($type != "text"){
	exit;
}

if($text == "取引開始" or  $text == "スタート")
{
$post_data = [
      "replyToken" => $replyToken,
      "messages" => [
      [
      "type" => "template",
      "altText" => "this is a buttons about how_to",
      "template" =>[
        "type" => "confirm",
        "text" => "取引を開始します。商品をどうやって受け渡すか選択して下さい。",
        "actions" => [
          [
            "type" => "postback",
            "label" => "直接",
            "data" => "sent_message=直接",
			"text" => "直接"
          ],
          [
            "type"=>"postback",
            "label"=>"郵送",
            "data"=>"sent_message=郵送",
			"text" => "郵送"
          ]
        ]
        ]
      ]
      ]
      ];

}
else if($text == "郵送")
{
	$text = "取引する商品の代金はいくらですか? 例. 1500(円)";
//返信データ作成
$response_format_text = [
	"type" => "text",
	"text" => $text
	];
$post_data = [
	"replyToken" => $replyToken,
	"messages" => [$response_format_text]
	];
}
else if($text == "直接")
{
	$text = "取引する商品の代金はいくらですか? 例. 1500(円)";
//返信データ作成
$response_format_text = [
	"type" => "text",
	"text" => $text
	];
$post_data = [
	"replyToken" => $replyToken,
	"messages" => [$response_format_text]
	];
/*
//返信データ作成
$response_format_text = [
	"type" => "image",
	"originalContentUrl" => "https://fullfill.sakura.ne.jp/messengerbot/img/mercari_icon1024.jpg",
	"previewImageUrl" => "https://fullfill.sakura.ne.jp/messengerbot/img/mercari_icon240.jpg"
	];
$post_data = [
	"replyToken" => $replyToken,
	"messages" => [$response_format_text]
	];
*/
}
else if($text == 3500)
{
$post_data = [
      "replyToken" => $replyToken,
      "messages" => [
      [
      "type" => "template",
      "altText" => "this is a buttons about how_to",
      "template" =>[
        "type" => "buttons",
        "text" => "取引する商品の送料を選択して下さい。\nYumaさんがお答え下さい。",
        "actions" => [
          [
            "type" => "postback",
            "label" => "400円",
            "data" => "sent_message=400円",
			"text" => "400円"
          ],
          [
            "type"=>"postback",
            "label"=>"600円",
            "data"=>"sent_message=600円",
			"text" => "600円"
          ],
		  [
            "type" => "postback",
            "label" => "900円",
            "data" => "sent_message=900円",
			"text" => "900円"
          ],
          [
            "type"=>"postback",
            "label"=>"1500円",
            "data"=>"sent_message=1500円",
			"text" => "1500円"
          ]
		]
        ]
      ]
      ]
      ];
}
else if($text == 2500)
{
$post_data = [
      "replyToken" => $replyToken,
      "messages" => [
      [
      "type" => "template",
      "altText" => "this is a buttons about how_to",
      "template" =>[
        "type" => "buttons",
	    "thumbnailImageUrl" => "https://fullfill.sakura.ne.jp/messengerbot/img/recipt.jpg",
		"imageSize" => "contain",
		"imageAspectRatio" => "square",
        "text" => "ご確認いただき、間違えがなければ、直接受け渡す際に、「支払う」ボタンを押して下さい。",
		"title" => "領収書",
        "actions" => [
          [
            "type" => "postback",
            "label" => "支払う",
			"data" => "sent_message=支払う",
			"text" => "支払う"
          ]
        ]
        ]
      ]
      ]
      ];
}
else if($text == "600円")
{
$post_data = [
      "replyToken" => $replyToken,
      "messages" => [
      [
      "type" => "template",
      "altText" => "this is a buttons about how_to",
      "template" =>[
        "type" => "confirm",
        "text" => "配送方法を選択して下さい。\nKotaさんがお答え下さい。",
        "actions" => [
          [
            "type" => "postback",
            "label" => "USPS",
            "data" => "sent_message=USPS",
			"text" => "USPS"
          ],
          [
            "type"=>"postback",
            "label"=>"FedEx",
            "data"=>"sent_message=FedEx",
			"text" => "FedEx"
          ]
        ]
        ]
      ]
      ]
      ];
}
else if($text == "USPS")
{
	$text = "配送先の住所を入力して下さい。\nKotaさんがお答え下さい。";
//返信データ作成
$response_format_text = [
	"type" => "text",
	"text" => $text
	];
$post_data = [
	"replyToken" => $replyToken,
	"messages" => [$response_format_text]
	];
}
else if($text == "熊本市中央区黒髪2丁目39番1号")
{
$post_data = [
      "replyToken" => $replyToken,
      "messages" => [
      [
      "type" => "template",
      "altText" => "this is a buttons about how_to",
      "template" =>[
        "type" => "buttons",
	    "thumbnailImageUrl" => "https://fullfill.sakura.ne.jp/messengerbot/img/recipt1.jpg",
		"imageSize" => "contain",
		"imageAspectRatio" => "square",
        "text" => "ご確認いただき、間違えがなければ、「お支払う」ボタンを押して下さい。",
		"title" => "領収書",
        "actions" => [
          [
            "type" => "postback",
            "label" => "お支払う",
			"data" => "sent_message=お支払う",
			"text" => "お支払う"
          ]
        ]
        ]
      ]
      ]
      ];
}
else if($text == "お支払う")
{
$post_data = [
      "replyToken" => $replyToken,
      "messages" => [
      [
      "type" => "template",
      "altText" => "this is a buttons about how_to",
      "template" =>[
        "type" => "buttons",
        "text" => "商品が届きましたら「届いた」ボタンを押して下さい。\n押すと売上金が送金されます。",
        "actions" => [
          [
            "type" => "postback",
            "label" => "届いた",
			"data" => "sent_message=届いた",
			"text" => "届いた"
          ]
        ]
        ]
      ]
      ]
      ];
	
}
else if($text == "支払う" or $text == "届いた")
{
$post_data = [
      "replyToken" => $replyToken,
      "messages" => [
      [
      "type" => "template",
      "altText" => "this is a buttons about how_to",
      "template" =>[
        "type" => "buttons",
	    "thumbnailImageUrl" => "https://fullfill.sakura.ne.jp/messengerbot/img/mercari_icon1024.jpg",
		"imageSize" => "contain",
		"imageAspectRatio" => "square",
        "text" => "お支払いが完了しました。\n今回の取引で得たお金はメルカリでもご使用いただけます。",
		"title" => "お支払い完了",
        "actions" => [
          [
            "type" => "uri",
            "label" => "メルカリで買い物をする",
			"uri" => "https://www.mercari.com/jp/"
          ],
          [
            "type" => "uri",
            "label" => "売上金を銀行口座に送金する",
			"uri" => "https://www.mercari.com/jp/help_center/"
          ]
		]
        ]
      ]
      ]
      ];
}
else
{
	$text = "お待ち下さい。";
//返信データ作成
$response_format_text = [
	"type" => "text",
	"text" => $text
	];
$post_data = [
	"replyToken" => $replyToken,
	"messages" => [$response_format_text]
	];
}


$ch = curl_init("https://api.line.me/v2/bot/message/reply");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json; charser=UTF-8',
    'Authorization: Bearer ' . $accessToken
    ));
$result = curl_exec($ch);
curl_close($ch);
?>
