# Changelog

## 0.1.0 (2025-09-03)

Full Changelog: [v0.0.2...v0.1.0](https://github.com/CASParser/cas-parser-php/compare/v0.0.2...v0.1.0)

### ⚠ BREAKING CHANGES

* use builders for RequestOptions
* rename errors to exceptions
* pagination field rename, and basic streaming docs
* **refactor:** namespacing cleanup
* **refactor:** clean up pagination, errors, as well as request methods

### Features

* **client:** add streaming ([8a3649a](https://github.com/CASParser/cas-parser-php/commit/8a3649ac38d283238cb78f183d88388d2220350f))
* **client:** improve error handling ([b8969bb](https://github.com/CASParser/cas-parser-php/commit/b8969bb06c1b5c4575ad2f0a25af16f2bb0f5c5f))
* **client:** use named parameters in methods ([f977b9a](https://github.com/CASParser/cas-parser-php/commit/f977b9a00b4f72c4d0add8e637baf699339b3707))
* ensure `-&gt;toArray()` benefits from structural typing ([16e7c95](https://github.com/CASParser/cas-parser-php/commit/16e7c9593a3216a1af73bd62b8c3d9561d2a05ad))
* pagination field rename, and basic streaming docs ([961e540](https://github.com/CASParser/cas-parser-php/commit/961e54000c4f7e50b2c2bdbed82ac08b4862450f))
* **php:** differentiate null and omit ([d5736cf](https://github.com/CASParser/cas-parser-php/commit/d5736cf656dd266165e262c6fe85a6bc0a12e5d9))
* **php:** rename internal types ([d8b47a2](https://github.com/CASParser/cas-parser-php/commit/d8b47a27256c7429058623b48624698804778320))
* **refactor:** clean up pagination, errors, as well as request methods ([26437b5](https://github.com/CASParser/cas-parser-php/commit/26437b521827b8cf5393feee1e8af173e18d7a22))
* **refactor:** namespacing cleanup ([666f374](https://github.com/CASParser/cas-parser-php/commit/666f37473888855fcc884cb9d851d43ce62aa75f))
* rename errors to exceptions ([92d9817](https://github.com/CASParser/cas-parser-php/commit/92d9817bf28718bfe5ecc6e61f6ed42abe4b0d4b))
* use builders for RequestOptions ([7f3730e](https://github.com/CASParser/cas-parser-php/commit/7f3730ee1d2081c219209b4cf06a9568af6b2559))


### Bug Fixes

* add create release workflow ([11358ea](https://github.com/CASParser/cas-parser-php/commit/11358ea756b190e7c2f459311f409f7ec6ddd255))
* basic pagination should work ([041e76c](https://github.com/CASParser/cas-parser-php/commit/041e76c9f5db339bd9834e609058b3b4edc865d3))
* **client:** elide null named parameters ([47e2824](https://github.com/CASParser/cas-parser-php/commit/47e28244783dd47d03f095cf0015aa947c0db5b8))
* minor bugs ([2e13643](https://github.com/CASParser/cas-parser-php/commit/2e13643e201a80bfb8d1ffbeea643133cb79701e))
* remove inaccurate `license` field in composer.json ([86ba48b](https://github.com/CASParser/cas-parser-php/commit/86ba48b8fc66042665d86362545915504f04011e))
* streaming internals ([39bcd29](https://github.com/CASParser/cas-parser-php/commit/39bcd29aa689ba5505428c732b63d07fc049c010))


### Chores

* add additional php doc tags ([4403319](https://github.com/CASParser/cas-parser-php/commit/44033196dc6699b911b64f473f95badc0f548c71))
* improve model annotations ([b45934c](https://github.com/CASParser/cas-parser-php/commit/b45934c91c079bc8eff6a3cfb53e8adab8927034))
* **internal:** refactor base client internals ([36dc0b6](https://github.com/CASParser/cas-parser-php/commit/36dc0b68f8706fe3bd5fcbb7f57c5487cbea2496))
* **internal:** refactored internal codepaths ([b306fa4](https://github.com/CASParser/cas-parser-php/commit/b306fa456c045ddd061225257fd4490e04099f12))
* intuitively order union types ([150660a](https://github.com/CASParser/cas-parser-php/commit/150660ae58f257d5faaa6f8cf7c4f9093e0bae2c))
* readme improvements ([ac66540](https://github.com/CASParser/cas-parser-php/commit/ac665402fa3edc84c13de25248d0b901e54aaab5))
* refactor request options ([f1b303a](https://github.com/CASParser/cas-parser-php/commit/f1b303add63f19005284bec65d3b5907d8f34372))
* **refactor:** simplify base page interface ([95b27e8](https://github.com/CASParser/cas-parser-php/commit/95b27e82468e3026ab7c6adad0af449ef2dd9355))
* remove `php-http/multipart-stream-builder` as a required dependency ([607f49a](https://github.com/CASParser/cas-parser-php/commit/607f49a7bfb66fc667c15ced3baaa556e1b689ab))
* remove type aliases ([ff49892](https://github.com/CASParser/cas-parser-php/commit/ff4989246f4c361a99aa1240db0b7c956fa5161d))
* simplify model initialization ([f38ec08](https://github.com/CASParser/cas-parser-php/commit/f38ec08395db6f5fcf1c8a8e2ccae49cd0e4537a))

## 0.0.2 (2025-08-18)

Full Changelog: [v0.0.1...v0.0.2](https://github.com/CASParser/cas-parser-php/compare/v0.0.1...v0.0.2)

### Chores

* configure new SDK language ([efe3aa8](https://github.com/CASParser/cas-parser-php/commit/efe3aa8298b2b8d8cbbb39519cd6e2b4155656a5))
* update SDK settings ([ec8569e](https://github.com/CASParser/cas-parser-php/commit/ec8569e4fe27cbd72199c5394b79bdbff771c132))
