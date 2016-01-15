/*
 * C# Server Emulator Project Blackout / PointBlank
 * Authors: the__all
 * Copyright (C) 2015 | OZ-Network
 */
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Core.Config;
using Core.Database;
using Core.Database.Tables;
using Core.Data.Parsers;
using Core.Data.Parsers.Missions;
using System.Threading;

namespace PointBlank
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.Title = "Point Blank Auth Server";
            Logger.Info("===============================================================================");
            Logger.Info("Point Blank Auth Server");
            Logger.Info("Develop OZ-Network.RU - 2015");
            Logger.Info("===============================================================================");
            ConfigModel.Load();
            Logger.Warn("Load XML=======================================================================");
            TutorialParser.Load();
            GameServersParser.Load();
            Logger.Warn("Load DataBase==================================================================");
            Connector.Connect();
            ClansTable.LoadTable();
            AccountTable.LoadTable();
            ItemsTable.LoadTable();
            PlayersTable.LoadTable();
            QuestsTable.LoadTable();
            PlayersConfigTable.LoadTable();
            PlayersStatsTable.LoadTable();
            TitlesTable.LoadTable();
            PlayerEquipTable.LoadTable();
            PlayersMedalsTable.LoadTable();
            Logger.Warn("Load Network===================================================================");
            NetworkS.Load();

            while (true)
            {
                Thread.Sleep(10000);
                Logger.Warn("Load DataBase==================================================================");
                ClansTable.LoadTable();
                AccountTable.LoadTable();
                ItemsTable.LoadTable();
                PlayersTable.LoadTable();
                QuestsTable.LoadTable();
                TitlesTable.LoadTable();
                PlayersConfigTable.LoadTable();
                PlayersStatsTable.LoadTable();
                TitlesTable.LoadTable();
                PlayerEquipTable.LoadTable();
                PlayersMedalsTable.LoadTable();
                Logger.Warn("===============================================================================");
            } 
        }
    }
}
