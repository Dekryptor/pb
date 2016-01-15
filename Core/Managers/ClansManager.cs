/*
 * C# Server Emulator Project Blackout / PointBlank
 * Authors: the__all
 * Copyright (C) 2015 | OZ-Network
 */
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Core.Model;
using Core.Database.Tables;

namespace Core.Managers
{
    public class ClansManager : SingletonBase<ClansManager>
    {
        public Clan getClanById(ulong id)
        {
            foreach (Clan im in ClansTable.clans.Values)
            {
                if (im.Id == id)
                    return im;
            }
            return null;
        }



        public Clan getClanForName(string name)
        {
            foreach (Clan clan in ClansTable.clans.Values)
            {
                if (clan.Name == name)
                    return clan;
            }
            return null;
        }

        public Dictionary<ulong, Clan> getClans()
        {
            return ClansTable.clans;
        }
    }
}
