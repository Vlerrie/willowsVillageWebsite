
create table `users` (`id` integer not null primary key autoincrement, `name` varchar not null, `surname` varchar, `email` varchar, `cell` varchar, `email_verified_at` datetime, `password` varchar not null, `google_login` tinyin
    t(1) not null default '0', `street_number` varchar, `route` varchar, `sublocality` varchar, `locality` varchar, `postal_code` varchar, `google_address_string` varchar, `complex_name` varchar, `complex_unit` varchar, `comm_newsletter
` tinyint(1) not null default '1', `comm_events` tinyint(1) not null default '1', `admin` tinyint(1) not null default '0', `remember_token` varchar, `created_at` datetime, `updated_at` datetime, `deleted_at` datetime)
create index `users_cell_index` on `users` (`cell`)
create index `users_email_index` on `users` (`email`)
create index `users_email_comm_newsletter_index` on `users` (`email`, `comm_newsletter`)
create index `users_email_comm_events_index` on `users` (`email`, `comm_events`)
create unique index `users_email_unique` on `users` (`email`)
create unique index `users_cell_unique` on `users` (`cell`)

create table `password_resets` (`email` varchar not null, `token` varchar not null, `created_at` datetime)
create index `password_resets_email_index` on `password_resets` (`email`)

create table `failed_jobs` (`id` integer not null primary key autoincrement, `uuid` varchar not null, `connection` text not null, `queue` text not null, `payload` text not null, `exception` text not null, `failed_at` datetime de
    fault CURRENT_TIMESTAMP not null)
create unique index `failed_jobs_uuid_unique` on `failed_jobs` (`uuid`)

create table `personal_access_tokens` (`id` integer not null primary key autoincrement, `tokenable_type` varchar not null, `tokenable_id` integer not null, `name` varchar not null, `token` varchar not null, `abilities` text, `la
st_used_at` datetime, `expires_at` datetime, `created_at` datetime, `updated_at` datetime)
create index `personal_access_tokens_tokenable_type_tokenable_id_index` on `personal_access_tokens` (`tokenable_type`, `tokenable_id`)
create unique index `personal_access_tokens_token_unique` on `personal_access_tokens` (`token`)

create table `news` (`id` integer not null primary key autoincrement, `subject` varchar not null, `body` text not null, `published` datetime, `created_at` datetime, `updated_at` datetime)
create index `news_published_index` on `news` (`published`)
