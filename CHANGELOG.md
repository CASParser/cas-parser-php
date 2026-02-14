# Changelog

## 0.4.0 (2026-02-14)

Full Changelog: [v0.3.0...v0.4.0](https://github.com/CASParser/cas-parser-php/compare/v0.3.0...v0.4.0)

### Features

* **api:** manual updates ([77615d4](https://github.com/CASParser/cas-parser-php/commit/77615d4ba6dd799e8a34af6a11ec4047685ca0f3))

## 0.3.0 (2026-02-14)

Full Changelog: [v0.2.0...v0.3.0](https://github.com/CASParser/cas-parser-php/compare/v0.2.0...v0.3.0)

### ⚠ BREAKING CHANGES

* **client:** redesign methods
* remove confusing `toArray()` alias to `__serialize()` in favour of `toProperties()`

### Features

* **api:** api update ([bbcfa14](https://github.com/CASParser/cas-parser-php/commit/bbcfa141a593d0d34c361c8ff2192dbd9e1ff0e3))
* **api:** api update ([7bb648b](https://github.com/CASParser/cas-parser-php/commit/7bb648b9b9d87fa14c75e16628fe6d01e99f1198))
* **api:** api update ([43a24ef](https://github.com/CASParser/cas-parser-php/commit/43a24ef1b13a87d203170dcc187c90045472cdea))
* **api:** api update ([a45d08d](https://github.com/CASParser/cas-parser-php/commit/a45d08d64d5a4ad700f31d9180d5f79ce5ef06f2))
* **api:** api update ([90a131a](https://github.com/CASParser/cas-parser-php/commit/90a131ad218e94a908056b01fb8425ab8783bbd4))
* **api:** api update ([da8b838](https://github.com/CASParser/cas-parser-php/commit/da8b83821dab28680f72e98a943af25df296e314))
* **api:** manual updates ([ef87761](https://github.com/CASParser/cas-parser-php/commit/ef877615b3b873e5f2cf3a3dfeb37f50dbaf71d5))
* **client:** redesign methods ([5bc4f8f](https://github.com/CASParser/cas-parser-php/commit/5bc4f8fbca8bd998535963059460dcc2285c479e))
* remove confusing `toArray()` alias to `__serialize()` in favour of `toProperties()` ([84053c4](https://github.com/CASParser/cas-parser-php/commit/84053c4b32db33f341e5e9bf89f2aabe982a2695))


### Bug Fixes

* **ci:** release doctor workflow ([d7d0f00](https://github.com/CASParser/cas-parser-php/commit/d7d0f005e9022cce83d3316626e5746a3a02b694))
* ensure auth methods return non-nullable arrays ([fd0ab3b](https://github.com/CASParser/cas-parser-php/commit/fd0ab3bb4232369f31350fb47d0aca4d916f5739))
* inverted retry condition ([0112a9a](https://github.com/CASParser/cas-parser-php/commit/0112a9a50be77cb4681413034b3d88d791774f6c))
* rename invalid types ([6b7a996](https://github.com/CASParser/cas-parser-php/commit/6b7a99682bfce707850bfddeb41d2474f109ba83))


### Chores

* add license ([7742369](https://github.com/CASParser/cas-parser-php/commit/7742369f0a91046a7aa843391627e8931c6280f8))
* **client:** send metadata headers ([9a72241](https://github.com/CASParser/cas-parser-php/commit/9a72241ae57939ae08709709a26a87f1ad83d9e2))
* **docs:** update readme formatting ([f992e92](https://github.com/CASParser/cas-parser-php/commit/f992e921cd7043ea562ad58fb01905bd2039fa50))
* **internal:** codegen related update ([c124b7b](https://github.com/CASParser/cas-parser-php/commit/c124b7bdd9b7d6f7bbef3d386f9eb4038a6b20f3))
* refactor methods ([e25fa02](https://github.com/CASParser/cas-parser-php/commit/e25fa02ca0d7d49d88f1859c99e2db925a74e722))
* update SDK settings ([66215fb](https://github.com/CASParser/cas-parser-php/commit/66215fb06d105b7678b59b7de76f68181d0c24fa))
* use pascal case for phpstan typedefs ([574d168](https://github.com/CASParser/cas-parser-php/commit/574d1680fbbaccfc4281a98e33d205f4d8a7e043))

## 0.2.0 (2025-09-13)

Full Changelog: [v0.1.0...v0.2.0](https://github.com/CASParser/cas-parser-php/compare/v0.1.0...v0.2.0)

### ⚠ BREAKING CHANGES

* expose services and service contracts

### Features

* **client:** add raw methods ([cec98f9](https://github.com/CASParser/cas-parser-php/commit/cec98f994a8f4b1dc12905a2dcd269cebbcc000d))
* **client:** support raw responses ([db0fac3](https://github.com/CASParser/cas-parser-php/commit/db0fac37cc5a9f56fb8f095f4c895f91a206bfa5))
* **client:** use real enums ([9b7428f](https://github.com/CASParser/cas-parser-php/commit/9b7428ffe0e2a19b1b7ad6c87e90ee14eddce749))
* expose services and service contracts ([36e3c1d](https://github.com/CASParser/cas-parser-php/commit/36e3c1d53c72f8b86e8ccf565fd3399bb3847834))


### Chores

* cleanup streaming ([d8d2163](https://github.com/CASParser/cas-parser-php/commit/d8d2163afa66e726f571c31276eaca485c4dda84))
* document parameter object usage ([8e520a0](https://github.com/CASParser/cas-parser-php/commit/8e520a0452175fc10becdd28fc9bf5b37cecf434))
* fix lints in UnionOf ([4fcc712](https://github.com/CASParser/cas-parser-php/commit/4fcc712c36036429b1f410f3c3ae88f3a8ad3147))
* make more targeted phpstan ignores ([35208e4](https://github.com/CASParser/cas-parser-php/commit/35208e4d7fced2de5826111980cfd51bebd1ad74))

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
