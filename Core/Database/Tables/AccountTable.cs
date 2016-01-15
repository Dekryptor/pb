/*
 * C# Server Emulator Project Blackout / PointBlank
 * Authors: the__all
 * Copyright (C) 2015 | OZ-Network
 */
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using MySql.Data.MySqlClient;
using Core.Model;

namespace Core.Database.Tables
{
    public class AccountTable
    {
        public static Dictionary<string, Account> accounts;
        public static void LoadTable()
        {
            try {
                accounts = new Dictionary<string, Account>();
                using (var reader = MySqlHelper.ExecuteReader(Connector.ConnectionString, "SELECT * FROM `accounts`"))
                {
                    while (reader.Read())
                    {
                        Account account = new Account()
                        {
                            AccountID = reader.GetUInt64("AccountID"),
                            accountName = reader.GetString("Login"),
                            Password = reader.GetString("Password"),
                            Status = reader.GetInt32("Status")
                        };
                        accounts.Add(account.accountName, account);
                    }
                }
                Logger.Info("[AccountsTable] Loaded {0} accounts", accounts.Count);
            } catch (Exception ex){
                Logger.Error("[Error] {0}", ex);
            }

        }

    }
}
    
