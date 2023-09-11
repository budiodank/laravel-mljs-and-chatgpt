<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel WebGL, brain-js, TensorFlow, and ChatGPT

This is a sample WebGL, brain-js, TensorFlow, and ChatGPT.
WebGL (short for Web Graphics Library) is a JavaScript API for rendering interactive 2D and 3D graphics within any compatible web browser without the use of plug-ins. (Wikipedia)
Brain.js is a JavaScript library used for neural networking, which is released as free and open-source software under the MIT License. (Wikipedia)
TensorFlow is a free and open-source software library for machine learning and artificial intelligence. It can be used across a range of tasks but has a particular focus on training and inference of deep neural networks. (Wikipedia)
ChatGPT, which stands for Chat Generative Pre-trained Transformer, is a large language model-based chatbot developed by OpenAI and launched on November 30, 2022, which enables users to refine and steer a conversation towards a desired length, format, style, level of detail, and language used. (Wikipedia)

## Version

<ol start="1">
<li>WebGL version 2.8.1</li>
<li>Brain JS version 2</li>
<li>Tensor Flow 2023</li>
<li>Chat GPT model gpt-3.5-turbo-16k-0613</li>
</ol>

## How To Use

1. Install dependencies

```
composer install
```

2. Copy the .env and set your CHATGPT_API_KEY. If you don't have CHATGPT_API_KEY [Register API Key](https://platform.openai.com/account/api-keys)

```
cp .env.example .env
```

3. Generate Laravel key

```
php artisan key:generate
```

4. Clear Config

```
php artisan config:cache
php artisan config:clear
```

5. Run

```
php artisan serve
```
