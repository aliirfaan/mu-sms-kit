# Change Log
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com) and this project adheres to [Semantic Versioning](https://semver.org).

## 2.1.1 - 2021-07-12

### Added

- Nothing

### Changed

- getTransactionReference() cater for responses without dash '-'

### Deprecated

- Nothing

### Removed

- Nothing

### Fixed

- Nothing

## 2.1.0 - 2021-02-18

### Added

- Nothing

### Changed

- smsWasSent() add new parameter $validTransactionReferenceMinLength

### Deprecated

- Nothing

### Removed

- Nothing

### Fixed

- Nothing

## 2.0.1 - 2021-02-18

### Added

- Nothing

### Changed

- sendSms() return transaction reference in message

### Deprecated

- Nothing

### Removed

- Nothing

### Fixed

- Nothing

## 2.0.0 - 2021-02-18

### Added

- Nothing

### Changed

- curl request
- sendSms() added $curlOptions as parameter so that you can pass your own cURL options

### Deprecated

- Nothing

### Removed

- params key in response
- remove CURLOPT_NOBODY, CURLOPT_HEADER in default cURL options

### Fixed

- Nothing