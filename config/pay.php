<?php

return [
    'alipay' => [
        // 支付宝分配的 APPID
        'app_id' => '2016083101829857',

        // 支付宝异步通知地址
        'notify_url' => 'http://sam.com/pay/info2',

        // 支付成功后同步通知地址
        'return_url' => 'http://sam.com/pay/info',

        // 阿里公共密钥，验证签名时使用
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAkjHkm7K67KSRm0NuF3mHzfCuI9ObwFVR/CSOhuKaT5DhDOvb1c4rsO7rRgPFD/Zgl5KOUTlV+1yPK/HvMfw0LQIoCbXXIv5ubRhQB1b3NCM6nN0EyyeAekaa6Y9aMOtD42/B50RJC6mQH2bnCHuoIgPGYZlsvQAa1ZEDwO87iV7ptXiSGVcJpQi1Gx2rkuh02oPzpRSH1yS/iyrvd80YpjrxqmWDRC8nWdRTZepw2AO6LxoSX2sIji+t7sXuThT37AJnmZcFATQwujhRzhfvJHFYxPKB2wLOzXtlyYq03ukbbsQI6BR4HKVelFgsxo4G6hGjzy8E+AOeoXeeQGY6qQIDAQAB',

        // 自己的私钥，签名时使用
        'private_key' => 'MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCSMeSbsrrspJGbQ24XeYfN8K4j05vAVVH8JI6G4ppPkOEM69vVziuw7utGA8UP9mCXko5ROVX7XI8r8e8x/DQtAigJtdci/m5tGFAHVvc0Izqc3QTLJ4B6Rprpj1ow60Pjb8HnREkLqZAfZucIe6giA8ZhmWy9ABrVkQPA7zuJXum1eJIZVwmlCLUbHauS6HTag/OlFIfXJL+LKu93zRimOvGqZYNELydZ1FNl6nDYA7ovGhJfawiOL63uxe5OFPfsAmeZlwUBNDC6OFHOF+8kcVjE8oHbAs7Ne2XJirTe6RtuxAjoFHgcpV6UWCzGjgbqEaPPLwT4A56hd55AZjqpAgMBAAECggEAMVrQr9OmEW/5jC42g4xO0bK4R3YP9d2YAQSibV0g9U2W/JK/s62XyHLQUOHC7IGj2GfszfUKVwLHfvF9bCWVw8Afni+agsDcrM3xbpjoedyO1Bg1nxQl5qHheIohy7QRRj4beyTteBd1hXRq+M0uVNVratWuBRx88q6zUrYxJk22/QKlLZ77vadvQeRz3bFnpNPUrWiYhzxn03i5nhOF8N3FkybWstVfRDa/d5QueHybmP9y18IDKYTterdxYey3MAWS2+cVCmMcUzrjerwNwvB7RhMgYX5AVeNTz1EmptrC8sY3ph/qYirUITSPqXMpECfnk9huSuUz8eBPFthFUQKBgQDDul4ISL5umCf8wQjhVhdDlJ5SOAxf7dTN9S5SWxg/0VwuuAkkUZwGlBsbsU0BQj+KTIRVnCcq3ccHFLBvh5wfw1wh3NSIvcsEvSo+fAi0Ucbmqhx0R4mhjPvDkRio0yVLUuBwROF8MNdoDRswfNDEJX5MLRRWjPU6c2DtPBn8zQKBgQC/Nrs3phVyz9c7tZi7ioujN8OGrvVF/EEQKyAuR4oMDNcwcL3vpFhNRCTZ6Qix6WLmeVxz+y0PqwQOilQdQPsMGjNXwkSb+RRT6i5Km/1V+q+Otmj7q00v70nMj78MxlwJzjC+hv65qrG3NqQO4cSLW7kTw0nmQRV2e90JFDn1TQKBgQCjKC0QjMsp1+6ldKiZZrGX5UCg2xX9tX0KftKxVjx9nmFQlJsSSnFczoNWb1L4tKfQ+n3p+3Ru+FbboTR+lDXiCHE5zSLiJgwhlCqt0alT30OFrtJvX97r62FHoiFDQle5VYnALLsmUnSNyTccET/Z8kM47u8gQvp9Uga/W7VyFQKBgQC1swiMhOH0y9O3BYUxESJH4wGFxlOEQYSCHLjjwU9IzBrgCQIz6nOOWKa7+1kr1p8Ia2KTQ6c6MEQWnRP5CHqGsY8AYbZYkIPkia+bbkd5oFGax3NTUyBx4Gy8Wgwt04A6QRjIs/bx72YYt2+GRLtDwdFJGlXq2wXOJT2RFwtMMQKBgBJwW3QiPpoLPp3itGiVYXOtby84/aw0a8tvqOHaAueK6H3tf2LkXT+k/iq2xq3QOLLX/NTmb2oE69SNNQ6qliZlSHZg1PGFY8K0TKbUeWpXf4MHzM3kTSB4C2GA9siRAHPoTY3qT85641jhMe1LU1qd7tv3w8FFaG2ndmCI/qJp',
    ],

    'wechat' => [
        // 公众号APPID
        'app_id' => '',

        // 小程序APPID
        'miniapp_id' => '',

        // APP 引用的 appid
        'appid' => '',

        // 微信支付分配的微信商户号
        'mch_id' => '',

        // 微信支付异步通知地址
        'notify_url' => '',

        // 微信支付签名秘钥
        'key' => '',

        // 客户端证书路径，退款时需要用到。请填写绝对路径，linux 请确保权限问题。pem 格式。
        'cert_client' => '',

        // 客户端秘钥路径，退款时需要用到。请填写绝对路径，linux 请确保权限问题。pem 格式。
        'cert_key' => '',
    ],
];
