Here is the complete SQL migration script to update and configure the Active / Expired Membership system on your live MySQL database (via phpMyAdmin, cPanel, or MySQL CLI).

SQL Migration Script
sql
-- ========================================================================
-- RAKMA Membership System: Add Expiry Tracking & Index
-- Table: user_membership
-- ========================================================================
-- 1. Add the `membership_expiry_date` column after `membership_date`
ALTER TABLE `user_membership` 
ADD COLUMN `membership_expiry_date` DATETIME NULL DEFAULT NULL AFTER `membership_date`;
-- 2. Backfill 2-Year membership expiry dates (Join and Upgrade) to start date + 2 years
UPDATE `user_membership` 
SET `membership_expiry_date` = DATE_ADD(`membership_date`, INTERVAL 2 YEAR)
WHERE `type` IN ('Join', 'Upgrade');
-- 3. Ensure Lifetime memberships explicitly have NULL expiry (never expire)
UPDATE `user_membership` 
SET `membership_expiry_date` = NULL 
WHERE `type` = 'Lifetime';
-- 4. Add composite performance index for fast queries and fast Excel exports
ALTER TABLE `user_membership` 
ADD INDEX `idx_um_status_type_expiry` (`membership_status`, `type`, `membership_expiry_date`);

-- 5. Membership Renewal Support: Update ENUM types for user_membership and transaction
ALTER TABLE `user_membership` 
MODIFY COLUMN `type` ENUM('Join','Upgrade','Lifetime','Renew') NOT NULL;

ALTER TABLE `transaction` 
MODIFY COLUMN `type` ENUM('Membership_Join','Membership_Upgrade','Membership_Renew') NOT NULL;
Verification Queries (Run after executing the migration)
You can run these verification queries to confirm that all records have been backfilled accurately on the live server:

sql
-- A. Verify expiry dates backfilled
SELECT 
    COUNT(*) AS total_memberships,
    COUNT(membership_expiry_date) AS memberships_with_expiry,
    SUM(CASE WHEN type = 'Lifetime' AND membership_expiry_date IS NULL THEN 1 ELSE 0 END) AS valid_lifetime_count,
    SUM(CASE WHEN membership_expiry_date IS NULL AND type != 'Lifetime' THEN 1 ELSE 0 END) AS unhandled_nulls
FROM `user_membership`;
-- Note: 'unhandled_nulls' should be 0.
-- B. Check breakdown of Active vs Expired vs Lifetime members
SELECT 
    CASE 
        WHEN type = 'Lifetime' THEN 'Lifetime (Active)'
        WHEN type IN ('Join', 'Upgrade') AND membership_expiry_date >= NOW() THEN 'Live / Active (2-Year)'
        WHEN type IN ('Join', 'Upgrade') AND membership_expiry_date < NOW() THEN 'Expired'
        ELSE 'Other'
    END AS membership_category,
    COUNT(*) AS member_count
FROM `user_membership`
WHERE `membership_status` = 'Active'
GROUP BY membership_category;
How to Run:
phpMyAdmin: Select your live database (u523483474_rakma2092024 or your live DB name) $\rightarrow$ Click on the SQL tab $\rightarrow$ Paste the queries above $\rightarrow$ Click Go.
SSH / MySQL CLI:
bash
mysql -u <username> -p <database_name> < migration.sql















----------------------------------






-- 1. Add 'Renew' to the membership type ENUM
ALTER TABLE `user_membership` 
MODIFY COLUMN `type` ENUM('Join','Upgrade','Lifetime','Renew') NOT NULL;

-- 2. Add 'Membership_Renew' to the transaction type ENUM
ALTER TABLE `transaction` 
MODIFY COLUMN `type` ENUM('Membership_Join','Membership_Upgrade','Membership_Renew') NOT NULL;










-----------------------


-- ========================================================================
-- RAKMA: Complete Membership Expiry Tracking & Renewal Migration
-- ========================================================================

-- Step 1: Add expiry date column (if not added yet)
ALTER TABLE `user_membership` 
ADD COLUMN `membership_expiry_date` DATETIME NULL DEFAULT NULL AFTER `membership_date`;

-- Step 2: Backfill 2-Year expiry dates for existing Join and Upgrade records
UPDATE `user_membership` 
SET `membership_expiry_date` = DATE_ADD(`membership_date`, INTERVAL 2 YEAR)
WHERE `type` IN ('Join', 'Upgrade') AND `membership_expiry_date` IS NULL;

-- Step 3: Ensure Lifetime memberships explicitly have NULL expiry
UPDATE `user_membership` 
SET `membership_expiry_date` = NULL 
WHERE `type` = 'Lifetime';

-- Step 4: Add index for performance optimization
ALTER TABLE `user_membership` 
ADD INDEX `idx_um_status_type_expiry` (`membership_status`, `type`, `membership_expiry_date`);

-- Step 5: Update ENUMs to support Renewal
ALTER TABLE `user_membership` 
MODIFY COLUMN `type` ENUM('Join','Upgrade','Lifetime','Renew') NOT NULL;

ALTER TABLE `transaction` 
MODIFY COLUMN `type` ENUM('Membership_Join','Membership_Upgrade','Membership_Renew') NOT NULL;



---------------------------------


-- A. Check breakdown of Active vs Expired vs Lifetime members
SELECT 
    CASE 
        WHEN type = 'Lifetime' THEN 'Lifetime (Active)'
        WHEN type IN ('Join', 'Upgrade', 'Renew') AND membership_expiry_date >= NOW() THEN 'Live / Active (2-Year)'
        WHEN type IN ('Join', 'Upgrade', 'Renew') AND membership_expiry_date < NOW() THEN 'Expired'
        ELSE 'Other'
    END AS membership_category,
    COUNT(*) AS member_count
FROM `user_membership`
WHERE `membership_status` = 'Active'
GROUP BY membership_category;

-- B. Verify ENUM definitions on user_membership and transaction
SHOW COLUMNS FROM `user_membership` LIKE 'type';
SHOW COLUMNS FROM `transaction` LIKE 'type';
